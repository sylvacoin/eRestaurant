<?php

if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Auth extends MX_Controller
{

    function __construct()
    {
	parent::__construct();
	//load models
	$this->load->model( ['mdl_auth'] );
	//$this->load->library( ['form_validation'] );
	//load all necessary helpers for this class
	$this->load->helper( ['array'] );
	
	$this->load->module('users');
	
	
	//load the template
	$this->load->module( 'templates' );
    }

    /*
     *  CONTROLLER PAGES
     * ========================================================================
     */

    function backend()
    {
	if ($this->form_validation->run($this, 'alogin') == TRUE){
            if ($this->input->get('redirect') != NULL) {
                redirect($this->input->get('redirect'));
            }else{
                redirect('dashboard/');
            }
        }
	$data = $this->page_settings( 'auth/login-view', '', '', 'Login Administrator', 'users/auth' );
	$this->templates->frontend( $data );
    }
    
    function login()
    {
	if ( $this->form_validation->run( $this, 'login') == TRUE){
            if ($this->input->get('redirect') != NULL) {
                redirect($this->input->get('redirect'), 'refresh');
            }else{
                redirect('dashboard/', 'refresh');
            }
        }
	$data = $this->page_settings( 'auth/login-view', '', '', 'Login user', 'users' );
	$this->templates->frontend( $data );
    }
    
    function edit( $id = '' )
    {
	if ( $this->form_validation->run( $this, 'auth' ) == TRUE ) {
	    $this->_submit_data();
	}
	$result = $this->_get_data_from_db( $id );
	$data = $this->page_settings( 'edit', $result, 'result', 'Edit', 'auth' );
	$this->templates->frontend( $data );
    }
    
    function activate_account( $token = NULL )
    {
	
	if ( !is_null($token) && strlen($token) == 36 )
	{
	    $user = $this->db->where('token', $token)
		    ->update('users', ['token' => TRUE]);
	   
	    if ( $user )
	    {
		$this->session->set_flashdata('success', 
			'Account activation was successful. You can now log in.');
		redirect('login');
	    }else{
		$this->session->set_flashdata('error', 
			'Account activation was not successful. Please try again or contact administrator.');
	    }
	    
	}else{
	    $this->session->set_flashdata('success', 
		    'Invalid activation token');
	}
	
	redirect('meta-page');
    }
    
    function results_page()
    {
	$data = $this->page_settings( 'results-view', NULL, NULL, NULL, 'users/auth' );
	$this->templates->frontend( $data );
    }

    function view( $id = NULL )
    {
	//if id is not numeric then its not a specific item. get everything
	if ( !is_numeric( $id ) ) {
	    $result = $this->_get( 'id' );
	    $data = $this->page_settings( 'edit', $result, 'result', 'Edit', 'mdl_auth' );
	} else {
	    $result = $this->get_where( $id );
	    $data = $this->page_settings( 'edit', $result, 'result', 'Edit', 'mdl_auth' );
	}

	$this->templates->frontend( $data );
    }
    
    function delete( $id = '' )
    {
	if ( is_numeric( $id ) ) {
	    $this->_delete( $id, 'mdl_auth' );
	}

	if ( $this->input->get( 'redirect' ) ) {
	    redirect( $this->input->get( 'redirect' ) );
	}
    }
    
    function logout(){
        
	Modules::run('users/update_last_seen');
        
	//Destroy the session
	$this->session->sess_destroy();

	//Recreate the session
	if (substr(CI_VERSION, 0, 1) == '2')
	{
	    $this->session->sess_create();
	}
	else
	{
	    $this->session->sess_regenerate(TRUE);
	}
	if ( isset( $_GET['redirect']) ){ 
	    redirect(site_url($_GET['redirect']));
	}
        redirect(site_url('login'));
    }
    
    function recovery(){
        if ($this->form_validation->run($this, 'recovery') == TRUE){
            if ($this->_reset_pword($this->input->post('email'))){
                $this->session->set_flashdata('success','Password was reset successfully check email for new password');
            }else{
		$this->session->set_flashdata('error','Password was not changed successfully. Please try again (fix later)');
	    }
        }

        $data = $this->page_settings( 'recovery-view', '', '', 'Password recovery', 'auth' );
        $this->templates->frontend($data);
    }

    function change_password(){
	$this->form_validation->set_rules('pswd','Password','required');
	$this->form_validation->set_rules('pswd1','Password Confirmation','required|matches[pswd]');
        if ($this->form_validation->run($this) == TRUE){
            $data['pswd'] = $this->input->post('pswd');
            $id = $this->session->id;

            if ($this->mdl_auth->_update($id, $data)){
                $this->session->set_flashdata('success','Password was updated successfully');
            }else{
                $this->session->set_flashdata('error','Password was not updated. Please try again later');
            }
        }
	$data = $this->page_settings( 'change-pswd-view', '', '', 'Change password', 'auth' );
        $this->templates->backend($data);
    }
    

    /*
     * AJAX FUNCTIONS
     * ========================================================================
     */

    function ajax_add()
    {
	
    }

    function ajax_view()
    {
	$result = $this->_get('id');
	if ( count($result) > 0 )
	{
	    foreach ( $result as $col)
	    {
		//do the extraction here and assign to $data
	    }
	}
	
	echo json_encode( $data );
    }

    function ajax_view_single()
    {
	$id = $this->input->get('id'); //change this to match your data-id from ajax call
	if ( !is_numeric($id) ) {
	    echo json_encode([]);
	    return;
	}
	
	$result = $this->_get_where($id);
	if ( count($result) > 0 )
	{
	    foreach ( $result as $col)
	    {
		//do the extraction here and assign to $data
	    }
	}
	
	echo json_encode( $data );
    }

    function ajax_delete()
    {
	$id = $this->input->get('id'); //change this to match your data-id from ajax call
	if ( !is_numeric($id) ) {
	    echo json_encode([]);
	    return;
	}
	
	if ( $this->_delete($id) ) {
	    echo json_encode('true');
	}else{
	    echo json_encode('false');
	}
    }

    function ajax_edit()
    {
	
    }

    /*
     * CRUD
     * =========================================================================
     */

    function _get( $order_by, $module = 'mdl_auth' )
    {
	$query = $this->$module->get( $order_by );
	return $query;
    }

    function _get_with_limit( $limit, $offset, $order_by, $module = 'mdl_auth' )
    {
	$query = $this->$module->get_with_limit( $limit, $offset, $order_by );
	return $query;
    }

    function _get_where( $id, $module = 'mdl_auth' )
    {
	$query = $this->$module->get_where( $id );
	return $query;
    }

    function _get_where_custom( $col, $value, $module = 'mdl_auth' )
    {
	$query = $this->$module->get_where_custom( $col, $value );
	return $query;
    }

    function _insert( $data, $module = 'mdl_auth' )
    {
	$this->$module->_insert( $data );
    }

    function _update( $id, $data, $module = 'mdl_auth' )
    {
	$this->$module->_update( $id, $data );
    }

    function _delete( $id )
    {
	$this->$module->_delete( $id, $module = 'mdl_auth' );
    }

    function _count_where( $column, $value, $module = 'mdl_auth' )
    {
	$count = $this->$module->count_where( $column, $value );
	return $count;
    }

    function _get_max( $module = 'mdl_auth')
    {
	$max_id = $this->$module->get_max();
	return $max_id;
    }

    function _custom_query( $mysql_query, $module = 'mdl_auth' )
    {
	$query = $this->$module->_custom_query( $mysql_query );
	return $query;
    }
    
    function _reset_pword($email){
        $this->load->helper('string');
        $data['pswd'] = random_string('alnum', 10);
        $result = $this->mdl_auth->get_where_custom('email',$email);
        $id = $result->row()->id;
        $this->mdl_auth->_update($id, $data);
	$data['user'] = $result->row()->firstname;

        return Modules::run('mail/send_mail', $email, $data, 'recovery');
    }

    /*
     * HELPERS
     * ========================================================================
     */

    function _get_data_from_post()
    {
	$data['colname']  = $this->input->post('postname');
       
        return $data;
    }

    function _get_data_from_db( $id = '' )
    {
	$returned = $this->$module->get_where($id);
        $data['postname'] = $returned->colname;
	
        return $data;
    }

    function _submit_data()
    {
	//get data from post
	$data = $this->get_data_from_post();
	
	//$data['photo'] = Modules::run('upload_manager/upload','image');
	$id = $this->uri->segment( 3 );
	if ( is_numeric( $id ) ) {
	    $this->_update( $id, $data );
	    redirect( 'auth/profile/' . $id );
	} else {
	    $this->_insert( $data );
	    redirect( 'auth/add_lecturer' );
	}
    }
    
    function authenticate($uname){   
        $pword = $this->input->post('pswd');
        
        $this->db->where('email', $uname);
        $this->db->where('pswd',md5($pword) );
	
	if ( $this->users->get_confirm_status() )
	{
	    $this->db->where('token',1);
	}
        $result = $this->mdl_auth->get();
        
        if ($result->num_rows() > 0){
            $this->create_session($result->row()->id);
            return TRUE;
        }else{
            $this->form_validation->set_message('authenticate','Invalid username or password');
            return FALSE;
        }
    }
    
    function authenticate_admin($email){   
        $pword = $this->input->post('pswd');
        
        $this->db->where('email', $email);
        $this->db->where('pswd', $pword);
        $result = $this->mdl_auth->get();
        
        if ($result->num_rows() > 0){
            $this->create_session($result->row()->id, true);   
            return TRUE;
        }else{
            $this->form_validation->set_message('authenticate_admin','Invalid email or password ');
            return FALSE;
        }
    }
    
    function validate_email( $email )
    {
	$result = $this->mdl_auth->get_where_custom('email', $email);
	if ($result->num_rows() > 0)
	{
	    return true;
	}else{
	    $this->form_validation->set_message('validate_email','Invalid email address or this email doesnt exist');
	    return false;
	}
    }
    
    function create_session($id, $admin = false){
	$result = $this->mdl_auth->get_where($id)->row();
	$this->session->user_id = $result->id;
	$this->session->name = $result->name;
//	$this->session->name = $result->firstname.' '.$result->lastname;
	$this->session->role  = $result->role_id;
//	$this->session->username = $result->username;
//	$this->session->email = $result->email;
//	$this->session->phone = $result->phone;
//	$this->session->wallet = $result->balance;
//	$this->session->photo = strrpos($result->image, '.') > 0 ? base_url().$result->image: base_url().'assets/img/static/avatar2.png';
//	Modules::run('payments/reset_boosts');

    }

    function get_dropdown_option( $name, $selected, $extra, $where = NULL, $module = '' )
    {
	$classes = $this->$module->get();
	if ( $where != NULL ) {
	    $this->db->where( $where );
	    $classes = $this->$module->get( 'class' );
	}
	if ( count( $classes ) > 0 ) {
	    $data[] = 'choose...';
	    foreach ( $classes->result() as $class )
	    {
		$data[ $class->class_id ] = $class->class;
	    }
	} else {
	    $data[] = 'No option has been added';
	}
	return form_dropdown( $name, $data, $selected, $extra );
    }

    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    function page_settings( $view_file, $view_data, $data_name = 'result', $page_title = '', $module = '' )
    {
	$data[ $data_name ] = $view_data;
	$data[ 'view_file' ] = $view_file;
	$data[ 'page_title' ] = $page_title;
	if ( $module != '' ) {
	    $data[ 'module' ] = $module;
	}
	return $data;
    }
    
    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }

}
