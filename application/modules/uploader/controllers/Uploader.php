<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Uploader extends MX_Controller
{

    public $dir        = null;
    private $dimension = array(
        'width'  => 500,
        'height' => 500,
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function index()
    {
        $this->load->view('upload_form');
    }

    public function set_width($w)
    {
        $this->dimension['width'] = $w;
    }

    public function set_height($h)
    {
        $this->dimension['height'] = $h;
    }

    public function upload($img, $dir = 'image', $resize = false, $delete = false)
    {
        $userimage_path = './assets/uploads/' . $dir . '/';
        $this->dir      = $dir . '/';

        $this->load->helper('string');
        $result = $this->upload_handler($img);

        if ($result['status'] == 'ok') {
            $file_name = $result['upload_data']['file_name'];
            $file_ext  = $result['upload_data']['file_ext'];

            //resize images into its appropriate locations
            /*
             * image is for user photo
             * biz is for business profile photo
             * profile is for user profiles only
             */

            $imgpath = 'assets/uploads/' . $dir . '/' . $file_name;
            if ($delete) {
                $this->delete_all($userimage_path);
            }

            if ($resize) {
                $imgpath = $this->resize_image($userimage_path . $file_name, $file_ext, true);
            }

        } else {
            $imgpath = $result;
        }
        return $imgpath;
    }

    public function upload_multiple($imgs)
    {
        $dir            = $this->session->user_id . '/';
        $userimage_path = './assets/uploads/' . $dir;
        $userthumb_path = './assets/uploads/' . $dir . 'thumb/';
        if (!is_dir($userimage_path)) {
            mkdir($userimage_path);
            mkdir($userthumb_path);
        }
        $this->load->helper('string');
        $result = $this->multi_upload_handler($imgs);

        foreach ($result as $image) {

            $file_name = $image['file_name'];
            $file_ext  = $image['file_ext'];
            $this->resize_image($userimage_path . $file_name, $file_ext);
            $imgpath[] = $this->imgname . '_thumb' . $file_ext;
        }
        return $imgpath;
    }

    public function getFiles()
    {
        define('DIV_ROW', '<div class="img-wrapper">');

        $dir             = $this->session->user_id . '/';
        $userimage_path  = './assets/uploads/' . $dir;
        $userthumb_path  = './assets/uploads/' . $dir . 'thumb/';
        $userothers_path = './assets/uploads/' . $dir . 'others/';

        $path     = $userimage_path;
        $realPath = base_url($path);
        $dir      = $this->scan_dir('./' . $path);
        $i        = 1;
        echo DIV_ROW;
        foreach ($dir as $file):
            if (in_array($file, ['.', '..'])) {
                continue;
            }
            if (!in_array(strtolower(substr($file, -4)), ['.jpg', '.png', '.gif',
            'jpeg'])) {
                continue;
            }
            ?>
		    <div class="img-container">
		        <a href="#" data-image-id="<?php echo $i++ ?> ">
		    	<div class="img">
		    	    <img src="<?php echo base_url($file); ?>" alt="" class="img-responsive" data-src="<?php echo $file; ?>" >
			    <input type="checkbox" name="images-check" value="<?php echo base_url($file); ?>" class="hidden">
		    	</div>
		        </a>
		    </div>

		<?php
endforeach;
        echo '</div>';
    }

    public function scan_dir($directory, $recursive = true)
    {
        $result = array();
        $handle = opendir($directory);
        while ($datei = readdir($handle)) {
            if (($datei != '.') && ($datei != '..') && ($datei != 'thumb.db')) {
                $file = $directory . $datei;
                if (is_dir($file)) {
                    if ($recursive) {
                        $result = array_merge($result, $this->scan_dir($file . '/'));
                    }
                } else {
                    $result[] = $file;
                }
            }
        }
        closedir($handle);
        return $result;
    }

    public function upload_handler($img, $encrypt = false)
    {
        $userimage_path = './assets/uploads/' . $this->dir;

        $config['upload_path']   = $userimage_path;
        $config['allowed_types'] = 'csv|gif|jpg|png|jpeg|pdf|zip|apk|rar';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['overwrite']     = true;
        $config['encrypt_name']  = $encrypt;

        //create default directories
        $this->make_directories($userimage_path);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($img)) {
            $data['status']      = 'ok';
            $data['upload_data'] = $this->upload->data();

        } else {
            $data['status']      = 'error';
            $data['upload_data'] = null;
            $data['msg']         = $this->upload->display_errors() . '  ' . $userimage_path;
        }

        return $data;
    }

    public function make_directories($userimage_path)
    {
        if (!is_dir($userimage_path)) {
            mkdir($userimage_path);
        }
    }

    public function multiple_upload($img)
    {
        $this->load->helper('string');
        $dir            = $this->session->user_id . '/';
        $userimage_path = './assets/uploads/' . $dir;
        $userthumb_path = './assets/uploads/' . $dir . 'thumb';

        $data                    = [];
        $config['upload_path']   = $userimage_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 0;
        $config['overwrite']     = false;

        if (!is_dir($userimage_path)) {
            mkdir($userimage_path);
            mkdir($userthumb_path);
        }

        $this->load->library('upload');
        $num_of_files_to_upload = count($_FILES[$img]['name']);
        for ($f = 0; $f < $num_of_files_to_upload; $f++):
            $_FILES['userfile']['name']     = $_FILES[$img]['name'][$f];
            $_FILES['userfile']['type']     = $_FILES[$img]['type'][$f];
            $_FILES['userfile']['tmp_name'] = $_FILES[$img]['tmp_name'][$f];
            $_FILES['userfile']['size']     = $_FILES[$img]['size'][$f];
            $_FILES['userfile']['error']    = $_FILES[$img]['error'][$f];

            $config['file_name'] = $_FILES[$img]['name'][$f];

            $this->upload->initialize($config);
            if (!$this->upload->do_upload()):
                $data[$f]['error']       = $this->upload->display_errors();
                $data[$f]['upload_data'] = null;
            else:
                $data[$f]['error']                = null;
                $data[$f]['upload_data']          = $this->upload->data();
                $data[$f]['upload_data']['thumb'] = $this->resize_image($userimage_path . $this->upload->data('file_name'), $this->upload->data('file_ext'));
            endif;

        endfor;

        return $data;
    }

    public function resize_image($src, $ext, $del_orig = false)
    {

        $userthumb_path = 'assets/uploads/' . $this->dir;

        $this->imgname            = random_string();
        $config['image_library']  = 'gd2';
        $config['new_image']      = './' . $userthumb_path . $this->imgname . $ext;
        $config['source_image']   = $src;
        $config['create_thumb']   = true;
        $config['maintain_ratio'] = true;
        $config['width']          = $this->dimension['width'];
        $config['height']         = $this->dimension['height'];

        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            return $this->image_lib->display_errors();
        } else {
            if ($del_orig) {@unlink($src);}
            return $userthumb_path . $this->imgname . '_thumb' . $ext;
        }

        //$this->image_lib->clear();
    }

    public function test()
    {

        $files = $this->input->post('files');
        print_r($files);
        if (count($files) > 0) {
            foreach ($files as $file) {
                if ($file == null) {
                    continue;
                }

                unlink(substr($file, strpos($file, 'assets/')));
            }
        }
    }

    public function delete_all($path)
    {
        $dir = scandir($path);
        //$this->debug($dir);
        foreach ($dir as $file):

            if (file_exists($path . $file) && is_file($path . $file)) {
                unlink($path . $file);
            }

        endforeach;
    }

    public function debug($array)
    {

        echo '<pre>' . print_r($array, 1) . '</pre>';
        die();
    }

}
