<?php

class home extends MX_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->module(['templates','customizer']);
	
    }
    
    function index(){
	//$data = $this->customizer->init_settings();
        $data['view_file'] = 'homepage';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    function about(){
	$data = $this->customizer->init_settings();
        $data['view_file'] = 'aboutpage';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    function signin(){
        $data['view_file'] = 'signin';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    function contact(){
	$data = $this->customizer->init_settings();
        $data['view_file'] = 'contactpage';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    function team(){
	$data = $this->customizer->init_settings();
        $data['view_file'] = 'teampage';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    function privacy(){
	$data = $this->customizer->init_settings();
        $data['view_file'] = 'privacy-and-terms';
        $data['module'] = 'home';
	//$this->debug($data);
        $this->templates->frontend($data);
    }
    
    
    function debug($array, $dumpData = false)
    {
	if ( $dumpData )
	{
	    echo '<pre>' . var_dump($array). '</pre>';
	}else{
	    echo '<pre>' . print_r($array, 1) . '</pre>';
	}
	die();
    }
}