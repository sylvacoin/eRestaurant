<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modal extends MX_Controller {
    
    public function __construct()
    {
	parent::__construct();
	$this->load->module('template');

    }

    function index(){
	    $data['view_file'] = 'welcome_message';
	    $data['page_title'] = 'Welcome Message';
	    $data['module'] = 'home';
	    $this->template->home($data);
    }
    
    function init_modal()
    {
	$this->load->view('init_modal');
    }

    function modal_fund_user($name, $id){
	$modal_data = ['name'=>rawurldecode($name), 'id'=>$id];
	$this->load->view('modal_fund_user', $modal_data);
    }
    
    function modal_view_user($id){
	$modal_data = Modules::run('users/modal_view',$id);
	$this->load->view('modal_view_user', $modal_data);
    }
    
    function modal_view_sms($id){
	$modal_data = Modules::run('sms/view',$id, true);
	$this->load->view('modal_view_sms', $modal_data);
    }
   
    function modal_view_transactions($id){
	$modal_data = Modules::run('transactions/view',$id, true);
	$this->load->view('modal_view_transactions', $modal_data);
    }

    function modal_create_order($menu_id){
        echo Modules::run('orders/modal_create_order', $menu_id);
    }

    function modal_view_order_schedules($menu_id){
        echo Modules::run('orders/modal_view_order_schedules', $menu_id);
    }
    
    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }
}
