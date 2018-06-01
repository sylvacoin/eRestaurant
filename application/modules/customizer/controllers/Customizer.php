<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Customizer extends MX_Controller
{

    function __construct() {
	parent::__construct();
	$this->load->module('templates');
	$this->load->model('mdl_customizer');
    }

    function index()
    {
	if ( !is_numeric($this->session->user_id) ) { redirect('login'); }
	$d = $this->db->get('settings', ['id'=>1])->row_array();
	$data = $this->page_settings('default', $d, NULL, 'Site customizer');
	$this->templates->backend($data);
    }
    
    function init_settings()
    {
	$d = $this->db->get('settings', ['id'=>1])->row_array();
	$data['sitename'] = $d['sitename'];
	$data['tagline'] = $d['tag'];
	$data['logo'] = $d['logo'];
	$data['favicon'] = $d['fav'];
	$data['description'] = $d['description'];
	$data['headerBG'] = $d['header_bg'];
	$data['secondaryBG'] = $d['secondary_bg'];
	$data['socials'] = (object)unserialize($d['socials']);
	$data['meta'] = (object)unserialize($d['meta']);
	$data['address'] = unserialize($d['contacts'])['address'];
	$data['mail'] = unserialize($d['contacts'])['mail'];
	$data['phone'] = unserialize($d['contacts'])['phone'];
	$data['what_we_do'] = (object) unserialize($d['what_we_do']);
	$data['about'] = $d['about'];
	$data['service_intro'] = $d['service_intro'];
	$data['services'] = unserialize($d['services']);
	$data['portfolio_intro'] = $d['portfolio_desc'];
	$data['reachus'] = $d['reachus_desc'];
	return $data;
    }
    
    function update_bg()
    {
	if ( isset($_FILES['sbg']['name']) || isset($_FILES['pbg']['name']) )
	{
	    $res = Modules::run('uploader/upload', 'pbg','settings', false, false);
	    $res1 = Modules::run('uploader/upload', 'sbg','settings', false, false);
	    if ( !isset($res['status']))
	    {
		$data['header_bg'] = $res;
	    }
	    
	    if ( !isset($res1['status']))
	    {
		$data['secondary_bg'] = $res1;
	    }
	    
	    if ( isset($data))
	    {
		$this->db->where('id', 1);
		$this->db->update('settings', $data);
		$this->session->set_flashdata('success', 'setting was saved successfully');
	    }else{
		$this->session->set_flashdata('error', 'setting was not saved successfully');
	    }
	}
	redirect('customizer');
    }
    
    function update_site_info()
    {
	if ( isset($_FILES['logo']['name']) || isset($_FILES['fav']['name']))
	{
	    $res1 = Modules::run('uploader/upload', 'logo','settings', false, false);
	    $res2 = Modules::run('uploader/upload', 'fav','settings', false, false);
	    
	    if (!isset($res1['status']))
	    {
		$data['logo'] = Modules::run('uploader/upload', 'logo','settings', false, false);
	    }
	    
	    if (!isset($res2['status']))
	    {
		$data['fav'] = Modules::run('uploader/upload', 'fav','settings', false, false);
	    }
	}
	
	if ( $this->input->post('sitename') !== NULL )
	{
	    $data['sitename'] = $this->input->post('sitename');
	}
	
	if ( $this->input->post('tag') !== NULL)
	{
	    $data['tag'] = $this->input->post('tag');
	}
	
	if ( $this->input->post('descr') !== NULL)
	{
	    $data['description'] = $this->input->post('descr');
	}

	if ( isset( $data ) )
	{
	    $this->db->update('settings', $data);
	    $this->session->set_flashdata('success', 'Settings was saved successfully');
	}else{
	    $this->session->set_flashdata('error', 'Settings was not saved');
	}
	
	redirect('customizer');
    }
    
    function update_site_content()
    {
	if ( $this->input->post('about') )
	{
	    $data['about'] = $this->input->post('about');
	}
	
	if ( $this->input->post('service_intro'))
	{
	    $data['service_intro'] = $this->input->post('service_intro');
	}
	
	if ( $this->input->post('service'))
	{
	    $data['services'] = serialize($this->input->post('service'));
	}
	
	if ( $this->input->post('portfolio_desc'))
	{
	    $data['portfolio_desc'] = $this->input->post('portfolio_desc');
	}
	if ( $this->input->post('reachus_desc'))
	{
	    $data['reachus_desc'] = $this->input->post('reachus_desc');
	}

	if ( isset( $data ) )
	{
	    $this->db->update('settings', $data);
	    $this->session->set_flashdata('success', 'Settings was saved successfully');
	}else{
	    $this->session->set_flashdata('error', 'Settings was not saved');
	}
	
	redirect('customizer');
    }
    
    
    function update_socials()
    {
	$data = NULL;
	
	if ( $this->input->post('fb') )
	{
	    $data['fb'] = $this->input->post('fb');
	}
	
	if ( $this->input->post('tw'))
	{
	    $data['tw'] = $this->input->post('tw');
	}
	
	if ( $this->input->post('ig'))
	{
	    $data['ig'] = $this->input->post('ig');
	}
	
	if ( $this->input->post('gp'))
	{
	    $data['gp'] = $this->input->post('gp');
	}
	
	if ( $this->input->post('li'))
	{
	    $data['li'] = $this->input->post('li');
	}
	
	if ( isset($data) )
	{
	    $this->db->update('settings', ['socials' => serialize($data)]);
	    $this->session->set_flashdata('success', 'settings saved successfuly');
	}else{
	    $this->session->set_flashdata('error', 'settings was not saved successfuly');
	}
	
	    redirect('customizer');
    }
    
    function update_meta()
    {
	$data = NULL;
	
	if ( $this->input->post('gvs') )
	{
	    $data['google'] = $this->input->post('gvs');
	}
	
	if ( $this->input->post('bvs'))
	{
	    $data['baidu'] = $this->input->post('bvs');
	}
	
	if ( $this->input->post('avs'))
	{
	    $data['alexa'] = $this->input->post('avs');
	}
	
	if ( $this->input->post('yvs'))
	{
	    $data['yandex'] = $this->input->post('yvs');
	}
	
	if ( isset($data) )
	{
	    $this->db->update('settings', ['meta' => serialize($data)]);
	    $this->session->set_flashdata('success', 'settings saved successfuly');
	}else{
	    $this->session->set_flashdata('error', 'settings was not saved successfuly');
	}
	redirect('customizer');
    }
    
    function update_contact()
    {
	$data = NULL;
	
	if ( $this->input->post('addr') )
	{
	    $data['address'] = $this->input->post('addr');
	}
	
	if ( $this->input->post('mail'))
	{
	    $data['mail'] = $this->input->post('mail');
	}
	
	if ( $this->input->post('phone'))
	{
	    $data['phone'] = $this->input->post('phone');
	}
	
	
	if ( isset($data) )
	{
	    $this->db->update('settings', ['contacts' => serialize($data)]);
	    $this->session->set_flashdata('success', 'settings saved successfuly');
	}else{
	    $this->session->set_flashdata('error', 'settings not saved successfuly');
	}
	
	redirect('customizer');
    }
    
    function add_wwd()
    {
	//get the data from post
	$postData = array(
	    'icon' => $this->input->post('icon'),
	    'title' => $this->input->post('title'),
	    'description' => $this->input->post('descr'),
	    'extra' => $this->input->post('extra')
	);
	//get the previous data from db
	$this->db->where('id', 1);
	$this->db->select('what_we_do');
	$db = $this->db->get('settings');
	
	if ( $db->num_rows() > 0 )
	{
	    $arr_db = unserialize($db->row()->what_we_do);
	    $arr_db[] = $postData;
	    $db = serialize( $arr_db );
	    $this->db->update('settings', ['what_we_do' => $db]);
	    $this->session->set_flashdata('success', 'Settings was saved successfully');
	}else{
	    $this->session->set_flashdata('error', 'Settings was not saved successfully. Contact admin');
	}
	redirect('customizer');
    }
    
    function update_wwd( $id = NULL )
    {
	 
	 if (! is_numeric($id))
	 {
	     redirect( 'customizer');
	 }
	 
	//get the data from post
	$postData = array(
	    'icon' => $this->input->post('icon'),
	    'title' => $this->input->post('title'),
	    'description' => $this->input->post('descr'),
	    'extras' => NULL
	);
	//get the previous data from db
	$this->db->where('id', 1);
	$this->db->select('service');
	$db = $this->db->get('settings');
	
	if ( $db->num_rows() > 0 )
	{
	    $arr_db = unserialize($db->row()->service);
	    $arr_db[$id] = $postData;
	    $db = $this->serialize( $arr_db );
	    $this->db->update('settings', ['service' => $db]);
	    $this->session->set_flashdata('success', 'Settings was saved successfully');
	}else{
	    $this->session->set_flashdata('error', 'Settings was not saved successfully. Contact admin');
	}
	redirect('customizer');
    }
    
    function delete_service( $id = NULL )
    {
	 
	 if (! is_numeric($id))
	 {
	     redirect( 'customizer');
	 }
	 
	//get the previous data from db
	$this->db->where('id', 1);
	$this->db->select('what_we_do');
	$db = $this->db->get('settings');
	
	if ( $db->num_rows() > 0 )
	{
	    $arr_db = unserialize($db->row()->what_we_do);
	    unset($arr_db[$id]);
	    $db = serialize( $arr_db );
	    $this->db->update('settings', ['what_we_do' => $db]);
	    $this->session->set_flashdata('success', 'Settings was saved successfully');
	}else{
	    $this->session->set_flashdata('error', 'Settings was not saved successfully. Contact admin');
	}
	redirect('customizer');
    }
    
    
    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    function page_settings($view_file, $view_data, $data_name = 'result', $page_title = NULL, $model = NULL)
    {
	if ($data_name == NULL) {
	    $data = $view_data;
	} else {
	    $data[$data_name] = $view_data;
	}
	$data['view_file'] = $view_file;
	$data['page_title'] = $page_title;
	if ($model != NULL) {
	    $data['module'] = $model;
	}
	return $data;
    }

    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }
}
