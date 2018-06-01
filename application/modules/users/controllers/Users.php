<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends MX_Controller
{
    private $confirm_registration;

    public function __construct()
    {
        parent::__construct();
        //load models
        $this->load->model(['mdl_users']);

        //load all necessary helpers for this class
        $this->load->helper(['array']);

        //load the template
        $this->load->module('templates');

        $this->confirm_registration = false;
    }

    /*
     *  CONTROLLER PAGES
     * ========================================================================
     */

    public function index()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        $data = $this->page_settings('default', null, null, 'Users', 'users');
        $this->templates->backend($data);
    }

    public function signup()
    {
        if ($this->form_validation->run($this, 'signup') == true) {
            $this->_submit_data();
        }

        //$this->load->view('add');

        $data = $this->page_settings('add', null, null, 'Add Users', 'users');
        $this->templates->frontend($data);
    }

    public function profile($edit = '')
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}

        $id = is_numeric($this->uri->segment(3)) ? $this->uri->segment(3) : $this->session->user_id;
        if ($edit == 'edit') {
            if ($this->form_validation->run($this, 'profile') == true) {
                $this->_submit_data();
            }
            $result = $this->_get_data_from_db($id);
            $data   = $this->page_settings('edit', $result, null, 'Edit profile', 'users');

        } else {
            //$this->db->join('marketers_info m', 'm.user_id = users.user_id');
            $this->db->join('country', 'country.country_id = marketers_info.country_id');
            $this->db->join('states', 'states.state_id = marketers_info.state_id');
            $this->db->join('lga', 'lga.lga_id = marketers_info.lga');
            $data['biz']       = $this->db->where(['id' => $id])->get('marketers_info', 'mdl_marketers_info')->row();
            $data['user']      = $this->db->where(['id' => $id])->get('users')->row();
            $data['view_file'] = 'profile';
        }
        $this->templates->backend($data);
    }

    public function view($id = null)
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get everything
        if (!is_numeric($id)) {
            $result = $this->_get();
            $data   = $this->page_settings('view', $result, 'users', 'View sellers', 'users');
        } else {
            $result = $this->_get_where($id);
            $data   = $this->page_settings('view', $result, 'users', 'View sellers', 'users');
        }
        //$this->load->view('view', $result);
        $this->templates->backend($data);
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $this->_delete($id, 'mdl_users');
        }

        if ($this->input->get('redirect')) {
            redirect($this->input->get('redirect'));
        }
    }

    /*
     * AJAX FUNCTIONS
     * ========================================================================
     */

    public function ajax_add()
    {
        if ($this->form_validation->run($this, 'users') == true) {
            //get data from post
            $data   = $this->_get_data_from_post();
            $return = [];
            //$data['photo'] = Modules::run('upload_manager/upload','image');

            $return['status'] = $this->mdl_users->_insert($data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to insert data please try again';
            $return['node']   = [
                'users' => $data['users'],
                'slug'  => $data['users_slug'],
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
                $data[] = ['users' => $col->users, 'id' => $col->user_id, 'slug' => $col->users_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_validate_data()
    {
        /*
         * validates an item using type. like validating ann email or a username if it exists
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
        $id = $this->input->post('user_id'); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        $result = $this->_get_where_custom('parent_id', $id)->result();
        if (count($result) > 0) {
            foreach ($result as $col) {
                //do the extraction here and assign to $data
                $data[] = ['users' => $col->users, 'id' => $col->user_id, 'slug' => $col->users_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        //$id = $this->input->get( 'user_id' ); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        if ($this->mdl_users->_delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function ajax_edit()
    {
        $id                = $this->input->post('id');
        $data['users']     = $this->input->post('users');
        $data['parent_id'] = $this->input->post('parent');

        $return = ['status' => false];
        if (is_numeric($id)) {
            $return['status'] = $this->mdl_users->_update($id, $data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to update data please try again';
        }
        echo json_encode($return);
    }

    /*
     * CRUD
     * =========================================================================
     */

    public function _get($order_by, $model = 'mdl_users')
    {
        $query = $this->$model->get($order_by);
        return $query;
    }

    public function _get_where($id, $model = 'mdl_users')
    {
        $query = $this->$model->get_where($id);
        return $query;
    }

    public function _get_where_custom($col, $value, $model = 'mdl_users')
    {
        $query = $this->$model->get_where_custom($col, $value);
        return $query;
    }

    public function _insert($data, $model = 'mdl_users')
    {
        if ($this->$model->_insert($data)) {

            if ($this->confirm_registration) {
                // send mail check mail configuration
                Modules::run('mail/send_mail', $data['email'], [
                    'name' => $data['name'],
                    'link' => site_url('users/validate/' . $data['token']),
                ], 'confirm_registration');
            } else {
                Modules::run('mail/send_mail', $data['email'], ['name' => $data['name']]);
            }
            $this->session->set_flashdata('success', 'Registration was successful. login to continue');
        } else {
            $this->session->set_flashdata('error', 'Registration failed please try again later');
        }
    }

    public function _update($id, $data, $model = 'mdl_users')
    {

        if ($this->$model->_update($id, $data)) {
            $this->session->set_flashdata('success', 'users was updated successfully');
        } else {
            $this->session->set_flashdata('error', 'users not updated please try again later');
        }
    }

    public function _delete($id, $model = 'mdl_users')
    {
        if ($this->$model->_delete($id)) {
            $this->session->set_flashdata('success', 'Data was deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Data was not deleted successfully please try again later');
        }
        if ($model == 'mdl_users') {
            redirect('users');
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
        return $this->db->update('users', ['last_seen' => date('Y-m-d H:i:s')]);
    }

    /*
     * HELPERS
     * ========================================================================
     */
    public function get_confirm_status()
    {
        return $this->confirm_registration;
    }

    public function _get_data_from_post()
    {

        if ($this->confirm_registration) {
            $data['token'] = $this->generate_token();
        }
        $data['name']    = $this->input->post('fname');
        $data['pswd']    = md5($this->input->post('pswd'));
        $data['phone']   = $this->input->post('phone');
        $data['email']   = $this->input->post('email');
        $data['role_id'] = Modules::run('users/role/get_default_role');
        return $data;
    }

    public function _get_data_from_db($id = null, $model = 'mdl_users')
    {
        $returned = $this->$model->get_where($id)->row();

        $data['fname']    = $returned->firstname;
        $data['lname']    = $returned->lastname;
        $data['uname']    = $returned->username;
        $data['email']    = $returned->email;
        $data['phone']    = $returned->phone;
        $data['photo']    = $returned->image;
        $data['role']     = $returned->role_id;
        $data['reg_date'] = time();

        //$data['photo'] = $returned->image;
        return $data;
    }

    public function _submit_data()
    {
        //get data from post
        $data = $this->_get_data_from_post();

        if (isset($_FILES['photo']) && $_FILES['photo']['name'] != null) {
            $data['image'] = Modules::run('uploader/upload', 'photo', 'profile');
        }

        $id = $this->uri->segment(3) == 'edit' ? $this->session->user_id : '';
        if (is_numeric($id)) {
            $this->_update($id, $data);
            Modules::run('auth/create_session', $this->session->user_id);
            redirect($this->uri->segment(3) == 'edit' ? 'users/profile' : 'users');
        } else {
            $this->_insert($data);
            redirect('login');
        }
    }

    public function get_dropdown_option($name, $selected, $extra, $where = null, $model = 'mdl_users')
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
                $options[$datum->user_id] = $datum->users;
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
