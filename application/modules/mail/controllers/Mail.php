<?php

class Mail extends MX_Controller
{

    private $noreply_to = '';
    private $sitename = '';
    private $siteemail = '';
    private $siteaddress = '';
    private $sitecontacts = '';
    public function __construct()
    {
	parent::__construct();
	$this->load->library('email');
	$this->noreply_to = 'noreply@kwikbiz.com';
	$this->sitename = 'kwikbiz';
	$this->siteemail = 'hello@kwikbiz.com';
	$this->siteaddress = 'cable road asaba';
	$this->sitecontacts = '08166897526';
    }

    function index()
    {
	redirect('');
    }

    function send_mail( $to, $data, $template = 'signup')
    {
	$data['sitename'] = $this->sitename;
	$data['siteaddress'] = $this->siteaddress;
	$data['sitecontacts'] = $this->sitecontacts;
	$data['siteemail'] 	= $this->siteemail;
	
	$config['useragent'] = $this->sitename;
	$config['mailtype'] = 'html';
	$config['wordwrap'] = false;
	$config['wrapchar'] = 76;
	$config['priority'] = 1;
	
	$this->email->reply_to($this->noreply_to, $this->sitename);
    $this->email->initialize($config);
	$this->email->from($this->siteemail,  $this->sitename);
	$this->email->to($to);

	$this->email->subject( $this->get_template_subject($template));
	$this->email->message( $this->load->view($template, $data, true));

	return $this->email->send();
    }

    function get_template_subject( $template )
    {
	switch ( $template )
	{
	    case 'signup':
		return  $this->sitename.' registration successful';
		break;
	    case 'confirm_registration':
		return  'Confirm registration';
		break;
	    case 'preorder':
		return 'New pre order request from '. $this->sitename;
		 case 'order':
		return 'New pre order request from '. $this->sitename;
		break;
	}
    }

    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }

}
