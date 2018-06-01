<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Menus extends MX_Controller
{
    private $confirm_registration;

    public function __construct()
    {
        parent::__construct();
        //load models
        $this->load->model(['mdl_menus']);

        //load all necessary helpers for this class
        $this->load->helper(['array']);

        //load the template
        $this->load->module('templates');
    }

    /*
     *  CONTROLLER PAGES
     * ========================================================================
     */

    public function index()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        $data = $this->page_settings('default', null, null, 'Menus', 'menus');
        $this->templates->backend($data);
    }

    public function create()
    {
        if ($this->form_validation->run($this, 'menus') == true) {
            $this->_submit_data();
        }

        $data = $this->page_settings('add', null, null, 'Add Menus', 'menus');
        $this->templates->frontend($data);
    }

    public function edit($id)
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}

        
        if ($this->form_validation->run($this, 'menus') == true) {
            $this->_submit_data();
        }

        $result = $this->_get_data_from_db($id);
        $data   = $this->page_settings('default', $result, null, 'Edit Dish', 'menus');

        $this->templates->backend($data);
    }

    public function view($id = null)
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get everything
        if (!is_numeric($id)) {
            $result = $this->_get('id');
            $data   = $this->page_settings('view', $result, 'menus', 'All Dishes', 'menus');
        } else {
            $result = $this->_get_where($id);
            $data   = $this->page_settings('view', $result, 'menus', $result->name.' details', 'menus');
        }
        $this->load->view('view', $data);
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $this->_delete($id, 'mdl_menus');
        }

        if ($this->input->get('redirect')) {
            redirect($this->input->get('redirect'));
        }
    }

    public function dishes()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        
       
        $result = $this->_get('id');
        $data   = $this->page_settings('dishes', $result, 'menus', 'All Dishes', 'menus');
        
        $this->templates->backend($data);
    }

    /*
     * AJAX FUNCTIONS
     * ========================================================================
     */

    public function ajax_add()
    {
        if ($this->form_validation->run($this, 'menus') == true) {
            //get data from post
            $data   = $this->_get_data_from_post();
            $return = [];
            //$data['photo'] = Modules::run('upload_manager/upload','image');

            $return['status'] = $this->mdl_menus->_insert($data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to insert data please try again';
            $return['node']   = [
                'menus' => $data['menus'],
                'slug'  => $data['menus_slug'],
                'id'    => $this->db->insert_id(),
            ];

            echo json_encode($return);
        }
    }

    public function ajax_view()
    {
        $result = $this->_get('id');
        if (count($result) > 0) {
            foreach ($result as $col) {
                //do the extraction here and assign to $data
                $data[] = ['menus' => $col->menus, 'id' => $col->menu_id, 'slug' => $col->menus_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_validate_data()
    {
        /*
         * validates an item using type. like validating ann email or a menuname if it exists
         * @return bool
         */
        $item   = $this->input->post('item');
        $type   = $this->input->post('type');
        $result = $this->_get_where_custom($type, $item)->result();
        if (count($result) > 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }

    public function ajax_view_children()
    {
        $id = $this->input->post('menu_id'); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        $result = $this->_get_where_custom('parent_id', $id)->result();
        if (count($result) > 0) {
            foreach ($result as $col) {
                //do the extraction here and assign to $data
                $data[] = ['menus' => $col->menus, 'id' => $col->menu_id, 'slug' => $col->menus_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        //$id = $this->input->get( 'menu_id' ); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        if ($this->mdl_menus->_delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function ajax_edit()
    {
        $id                = $this->input->post('id');
        $data['menus']     = $this->input->post('menus');
        $data['parent_id'] = $this->input->post('parent');

        $return = ['status' => false];
        if (is_numeric($id)) {
            $return['status'] = $this->mdl_menus->_update($id, $data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to update data please try again';
        }
        echo json_encode($return);
    }

    /*
     * CRUD
     * =========================================================================
     */

    public function _get($order_by, $model = 'mdl_menus')
    {
        $query = $this->$model->get($order_by);
        return $query;
    }

    public function _get_where($id, $model = 'mdl_menus')
    {
        $query = $this->$model->get_where($id);
        return $query;
    }

    public function _get_where_custom($col, $value, $model = 'mdl_menus')
    {
        $query = $this->$model->get_where_custom($col, $value);
        return $query;
    }

    public function _insert($data, $model = 'mdl_menus')
    {
        if ($this->$model->_insert($data)) {
            $this->session->set_flashdata('success', 'New dish was added successfully');
        } else {
            $this->session->set_flashdata('error', 'New dish not added please try again');
        }
    }

    public function _update($id, $data, $model = 'mdl_menus')
    {

        if ($this->$model->_update($id, $data)) {
            $this->session->set_flashdata('success', 'Dish was updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Dish not updated please try again later');
        }
    }

    public function _delete($id, $model = 'mdl_menus')
    {
        if ($this->$model->_delete($id)) {
            $this->session->set_flashdata('success', 'Dish was deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Dish was not deleted successfully please try again later');
        }
        if ($model == 'mdl_menus') {
            redirect('menus');
        }
    }

    /*
     * WIDGETS
     * ========================================================================
     */

    public function generate_token()
    {
        return random_string('alnum', 36);
    }

    public function update_last_seen()
    {
        $id = $this->session->user_id;
        $this->db->where('id', $id);
        return $this->db->update('menus', ['last_seen' => date('Y-m-d H:i:s')]);
    }

    /*
     * HELPERS
     * ========================================================================
     */

    public function _get_data_from_post()
    {
        $data['name']           = $this->input->post('name');
        $data['description']    = $this->input->post('description');
        $data['price']          = $this->input->post('price');
        $data['isActive']       = $this->input->post('available') !== NULL ? 1 : 0;
        return $data;
    }

    public function _get_data_from_db($id = null, $model = 'mdl_menus')
    {
        $returned = $this->$model->get_where($id)->row();

        $data['name']           = $returned->name;
        $data['description']    = $returned->description;
        $data['price']          = $returned->price;
        $data['available']      = $returned->isActive;
        $data['preview']          = $returned->photo;
        
        //$data['photo'] = $returned->image;
        return $data;
    }

    public function _submit_data()
    {
        //get data from post
        $data = $this->_get_data_from_post();

        if (isset($_FILES['image']) && $_FILES['image']['name'] != null) {
            $response = Modules::run('uploader/upload', 'image', 'dishes', false, false);
            if ( isset($response['status']) )
            {
                $this->session->set_flashdata('error', 'Image was not uploaded please reupload your image. ');
                redirect('menus');
            }else{
                $data['photo'] = $response;
            }
        }

        $id = $this->uri->segment(3);
        if (is_numeric($id)) {
            $this->_update($id, $data);
            redirect($this->uri->segment(3) == 'edit' ? 'menus/profile' : 'menus');
        } else {
            $this->_insert($data);
            redirect('menus');
        }
    }

    public function get_dropdown_option($name, $selected, $extra, $where = null, $model = 'mdl_menus')
    {
        $data = [];
        if ($where != null) {
            $this->db->where($where);
            $data = $this->$model->get();
        } else {
            $data = $this->$model->get();
        }
        if (count($data) > 0) {
            $options[null] = '--choose--';
            foreach ($data as $datum) {
                $options[$datum->menu_id] = $datum->menus;
            }
        } else {
            $options[] = 'No option has been added';
        }
        return form_dropdown($name, $options, $selected, $extra);
    }

    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    public function page_settings($view_file, $view_data, $data_name = 'result', $page_title = null, $model = null)
    {
        if ($data_name == null) {
            $data = $view_data;
        } else {
            $data[$data_name] = $view_data;
        }
        $data['view_file']  = $view_file;
        $data['page_title'] = $page_title;
        if ($model != null) {
            $data['module'] = $model;
        }
        return $data;
    }

    public function debug($array)
    {
        echo '<pre>' . print_r($array, 1) . '</pre>';
        die();
    }

}
