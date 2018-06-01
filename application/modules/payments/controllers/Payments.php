<?php

if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );
if ( ! defined('VAT') )
{
	define('VAT', '1.5');
}
class Payments extends MX_Controller
{

    private $url;
    private $ref_id;
    private $auth_header;
    function __construct()
    {
	parent::__construct();
	//load models
	$this->load->model( ['mdl_boosted', 'mdl_transactions'] );
	
	//load all necessary helpers for this class
	$this->load->helper( ['array'] );

	//load the template
	$this->load->module( 'templates' );
	
	//The parameter after verify/ is the transaction reference to be verified
	$this->url = 'https://api.paystack.co/transaction/verify/';
	$this->ref_id = NULL;
	$this->auth_header = 'Authorization: Bearer sk_test_78cbef1a6b0ba83540ad681a500ed8c44793f46f';
    }

    /*
     *  CONTROLLER PAGES
     * ========================================================================
     */

    function index()
    {
		$data = $this->page_settings( 'default', NULL, NULL, 'Fund wallet' );
		$this->templates->backend( $data );
    }

    function fund_demo()
    {
		$data = $this->page_settings( 'demo-fund-wallet', NULL, NULL, 'Fund wallet' );
		$this->templates->backend( $data );
    }
    
    function paystack()
    {
	$this->fund_wallet();
    }
    
    function bitcoin()
    {
	$data = $this->page_settings( 'default', NULL, NULL, 'Fund wallet' );
	$this->templates->backend( $data );
    }
    
    function bank()
    {
	
    }

    function demo()
    {
		$data = $this->page_settings( 'demo-fund-wallet', NULL, NULL, 'Fund wallet' );
		$this->templates->backend( $data );
    }
    
//    Allows the plugin to load required javascripts to execute ajax requests.
    function init( $payment_option = 'bank')
    {
	if ( !in_array($payment_option, ['bank','paystack','bitcoin', 'demo']))
	{
	    die('Choose a payment option to init. [Allowed payment options] bank, paystack, bitcoin');
	}
	
	return $this->load->view($payment_option, NULL, true);
    }

    function fund_wallet()
    {
		$data = $this->page_settings( 'fund-wallet', NULL, NULL, 'Fund wallet' );
		$this->templates->backend( $data );
    }
    
    function set_ref_id( $id )
    {
	$this->ref_id = $id;
    }
    
    function prep_url()
    {
	$this->url .= $this->ref_id;
    }
    
    /* AJAX FUNCTIONS
     * ========================================================================
     */

    function ajax_verify_transaction()
    {
	$this->set_ref_id( $this->input->post( 'trans_id' ) );
	$this->prep_url();
	
	$amount = $this->input->post( 'amount' );
	$result = array();

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $this->url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt(
	    $ch, CURLOPT_HTTPHEADER, [ $this->auth_header ]
	);
	$request = curl_exec( $ch );
	curl_close( $ch );

	if ( $request != NULL ) {
	    $result = json_decode( $request, true );
	}

	if ( array_key_exists( 'data', $result ) && array_key_exists( 'status', $result[ 'data' ] ) && ($result[ 'data' ][ 'status' ] === 'success') ) {
	    if ( $this->confirm_payment( $this->ref_id ) ) {
		$this->update_wallet( $amount );

		$returned[ 'status' ] = 'true';
		$returned[ 'msg' ] = 'Transaction was successful';
	    } else {
		$returned[ 'status' ] = 'false';
		$returned[ 'msg' ] = "Transaction was unsuccessful";
	    }
	    //Perform necessary action
	} else {
	    $returned[ 'status' ] = 'false';
	    $returned[ 'msg' ] = "Transaction was unsuccessful";
	}

	echo json_encode( $returned );
    }

 

    function ajax_add_transaction()
    {
	$return = [];
	if ( $this->form_validation->run( $this, 'transaction' ) == TRUE ) {
	    //get data from post
	    $data = $this->_get_trans_data_from_post();

	    $return[ 'status' ] = $this->mdl_transactions->_insert( $data ) ? 'true' : 'false';
	    $return[ 'msg' ] = $return[ 'status' ] ? NULL : 'An error occured trying to insert data please try again';
	    $return[ 'node' ] = [
		'trans_id' => $data[ 'guid' ] . '-' . $this->db->insert_id(),
		'phone' => $this->session->phone,
		'email' => $this->session->email,
		'amount' => $data[ 'total' ] * 100,
	    ];
	} else {
	    $return[ 'status' ] = 'false';
	}

	echo json_encode( $return );
    }


     function ajax_verify_demo_transaction()
    {
	$this->set_ref_id( $this->input->post( 'trans_id' ) );
	
	
	$amount = $this->input->post( 'amount' );
	$result = array();

    if ( $this->confirm_payment( $this->ref_id ) ) {
		$this->update_wallet( $amount );

		$returned[ 'status' ] = 'true';
		$returned[ 'msg' ] = 'Transaction was successful';
    } else {
		$returned[ 'status' ] = 'false';
		$returned[ 'msg' ] = "Transaction was unsuccessful";
    }

	echo json_encode( $returned );
    }


    function ajax_view()
    {
	$result = $this->_get( 'states_id' );
	if ( count( $result ) > 0 ) {
	    foreach ( $result as $col )
	    {
		//do the extraction here and assign to $data
		$data[] = ['states' => $col->states, 'id' => $col->states_id, 'slug' => $col->states_slug];
	    }
	}

	echo json_encode( $data );
    }

    function ajax_view_single()
    {
	$id = $this->input->get( 'states_id' ); //change this to match your data-id from ajax call
	if ( !is_numeric( $id ) ) {
	    echo json_encode( ['status' => FALSE] );
	    return;
	}

	$result = $this->_get_where( $id )->result();
	if ( count( $result ) > 0 ) {
	    foreach ( $result as $col )
	    {
		//do the extraction here and assign to $data
		$data[] = ['states' => $col->states, 'id' => $col->states_id, 'slug' => $col->states_slug];
	    }
	}

	echo json_encode( $data );
    }

    function ajax_view_by_country()
    {
	$id = $this->input->post( 'country' ); //change this to match your data-id from ajax call
	if ( !is_numeric( $id ) ) {
	    echo json_encode( ['status' => FALSE] );
	    return;
	}

	$result = $this->_get_where_custom( 'country_id', $id )->result();
	if ( count( $result ) > 0 ) {
	    foreach ( $result as $col )
	    {
		//do the extraction here and assign to $data
		$data[] = ['states' => $col->state, 'id' => $col->state_id, 'slug' => $col->state_slug];
	    }
	}

	echo json_encode( $data );
    }

    function ajax_delete( $id )
    {
	//$id = $this->input->get( 'states_id' ); //change this to match your data-id from ajax call
	if ( !is_numeric( $id ) ) {
	    echo json_encode( ['status' => FALSE] );
	    return;
	}

	if ( $this->mdl_payments->_delete( $id ) ) {
	    echo json_encode( ['status' => TRUE] );
	} else {
	    echo json_encode( ['status' => FALSE] );
	}
    }

    function ajax_edit()
    {
	$id = $this->input->post( 'id' );
	$data[ 'states' ] = $this->input->post( 'states' );
	$data[ 'parent_id' ] = $this->input->post( 'parent' );

	$return = ['status' => FALSE];
	if ( is_numeric( $id ) ) {
	    $return[ 'status' ] = $this->mdl_payments->_update( $id, $data ) ? TRUE : FALSE;
	    $return[ 'msg' ] = $data[ 'status' ] ? NULL : 'An error occured trying to update data please try again';
	}
	echo json_encode( $return );
    }

    /*
     * CRUD
     * =========================================================================
     */

    function _get( $order_by, $model = 'mdl_payments' )
    {
	$query = $this->$model->get( $order_by );
	return $query;
    }

    function _get_with_limit( $limit, $offset, $order_by, $model = 'mdl_payments' )
    {
	$query = $this->$model->get_with_limit( $limit, $offset, $order_by );
	return $query;
    }

    function _get_where( $id, $model = 'mdl_payments' )
    {
	$query = $this->$model->get_where( $id );
	return $query;
    }

    function _get_where_custom( $col, $value, $model = 'mdl_payments' )
    {
	$query = $this->$model->get_where_custom( $col, $value );
	return $query;
    }

    function _insert( $data, $model = 'mdl_payments', $msg = NULL )
    {
	if ( $this->$model->_insert( $data ) ) {
	    $this->session->set_flashdata( 'success', $msg != NULL ? $msg : 'Data was added successful'  );
	} else {
	    $this->session->set_flashdata( 'error', 'Data was not added successful please try again later' );
	}
    }

    function _update( $id, $data, $model = 'mdl_payments' )
    {

	if ( $this->$model->_update( $id, $data ) ) {
	    $this->session->set_flashdata( 'success', 'states was updated successfully' );
	} else {
	    $this->session->set_flashdata( 'error', 'states not updated please try again later' );
	}
    }

    function _delete( $id, $model = 'mdl_payments' )
    {
	if ( $this->$model->_delete( $id ) ) {
	    $this->session->set_flashdata( 'success', 'Data was deleted successfully' );
	} else {
	    $this->session->set_flashdata( 'error', 'Data was not deleted successfully please try again later' );
	}
	if ( $model == 'mdl_payments' ) {
	    redirect( 'states' );
	}
    }

    function _count_where( $column, $value, $model = 'mdl_payments' )
    {
	$count = $this->$model->count_where( $column, $value );
	return $count;
    }

    function _get_max( $model = 'mdl_payments' )
    {
	$max_id = $this->$model->get_max();
	return $max_id;
    }

    function _custom_query( $mysql_query, $model = 'mdl_payments' )
    {
	$query = $this->$model->_custom_query( $mysql_query );
	return $query;
    }

    /*
     * HELPERS
     * ========================================================================
     */

    //this function runs anytime a person logs in and 
    //it does some operation of cleaning up those that their time has expired
    
  
    function _get_trans_data_from_post()
    {
	$data[ 'guid' ] = random_string( 'alnum', 15 );
	$data[ 'amt' ] = $this->input->post( 'amount' );
	$data[ 'vat' ] = $data[ 'amt' ] * VAT;
	$data[ 'total' ] = $data[ 'vat' ] + $data[ 'amt' ];
	$data[ 'trans_date' ] = time();
	return $data;
    }

    function _get_data_from_post()
    {
	$data[ 'state' ] = $this->input->post( 'state' );
	$data[ 'country_id' ] = $this->input->post( 'country' );
	$data[ 'state_slug' ] = strtolower( url_title( $this->input->post( 'state' ), '-' ) );
	return $data;
    }

    function _get_data_from_db( $id = NULL, $model = 'mdl_payments' )
    {
	$returned = $this->$model->get_where( $id )->row();
	$data[ 'state' ] = $returned->state;
	$data[ 'country' ] = $returned->country_id;
	$data[ 'id' ] = $returned->state_id;
	return $data;
    }

    function _submit_data()
    {
	//get data from post
	$data = $this->_get_data_from_post();

	$id = $this->uri->segment( 3 );
	if ( is_numeric( $id ) ) {
	    $this->_update( $id, $data );
	    redirect( 'states' );
	} else {
	    $this->_insert( $data );
	    redirect( 'states' );
	}
    }

    function update_wallet( $amt )
    {
	$this->db->where( 'id', $this->session->user_id );
	$balance = $this->db->get( 'users' )->row()->balance;

	$this->db->where( 'id', $this->session->user_id );
	$total = $balance + $amt;
	$this->db->update( 'users', ['balance' => $total] );
	$this->session->wallet = $total;
    }

    function confirm_payment( $ref_id )
    {
	$data[ 'is_complete' ] = 1;

	$datum = explode( '-', $ref_id );
	$this->db->where( [
	    'guid' => $datum[ 0 ],
	    'trans_id' => $datum[ 1 ],
	] );
	return $this->db->update( 'transactions', $data );
    }

    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    function page_settings( $view_file, $view_data, $data_name = 'result', $page_title = NULL, $model = 'payments' )
    {
	if ( $data_name == NULL ) {
	    $data = $view_data;
	} else {
	    $data[ $data_name ] = $view_data;
	}
	$data[ 'view_file' ] = $view_file;
	$data[ 'page_title' ] = $page_title;
	if ( $model != NULL ) {
	    $data[ 'module' ] = $model;
	}
	return $data;
    }

}
