<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Orders extends MX_Controller
{
    private $confirm_registration;
    private $adminMail;

    public function __construct()
    {
        $adminMail = 'hclinton007@gmail.com';
        parent::__construct();
        //load models
        $this->load->model(['mdl_orders', 'mdl_order_history']);

        //load all necessary helpers for this class
        $this->load->helper(['array']);

        //load the template
        $this->load->module('templates');
        date_default_timezone_set('Africa/Lagos');
    }

    /*
     *  CONTROLLER PAGES
     * ========================================================================
     */

    public function index()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        $data = $this->page_settings('default', null, null, 'Orders', 'orders');
        $this->templates->backend($data);
    }

    public function create()
    {
        
        if ($this->form_validation->run($this, 'orders') == true) {
            $this->_submit_data();
        }

        $data = $this->page_settings('add', null, null, 'Add Orders', 'orders');
        $this->templates->frontend($data);
    }

    public function edit($id)
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}

        
        if ($this->form_validation->run($this, 'orders') == true) {
            $this->_submit_data();
        }

        $result = $this->_get_data_from_db($id);
        $data   = $this->page_settings('default', $result, null, 'Edit Orders', 'orders');

        $this->templates->backend($data);
    }

    public function view($id = null)
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get everything
        if (!is_numeric($id)) {
            $result = $this->_get('id');
            $data   = $this->page_settings('view', $result, 'orders', 'All Orderses', 'orders');
        } else {
            $result = $this->_get_where($id);
            $data   = $this->page_settings('view', $result, 'orders', $result->name.' details', 'orders');
        }
        $this->load->view('view', $data);
    }

    public function customer_orders( $status = 'all', $days = null, $id = null  )
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get everything
        if ( $days != null )
        {
            $this->db->like('order_date', date('Y-m-d', time() ));
        }

        if ( $status != 'all' || $status != null )
        {
            $this->db->where('status', ($status == 'active' ? 1 : 0) );
        }


       $this->db->select('*, users.id as uid, menu.id as mid, orders.id as oid, users.name as uname, order_history.id as ohid');
        $this->db->join('users', 'users.id = order_history.user_id');
        $this->db->join('orders', 'orders.id = order_history.order_id');
        $this->db->join('menu', 'menu.id = orders.menu_id');

        if (!is_numeric($id)) {

            $result = $this->db->get('order_history')->result();
            $data   = $this->page_settings('all_orders', $result, 'orders', 'All Customer orders', 'orders');
        } else {
            $result = $this->db->get_where('order_history', ['id' => $id ]);
            $data   = $this->page_settings('view', $result, 'orders', $result->name.' details', 'orders');
        }
        //$this->debug( $data );
        $this->templates->backend($data);
    }

    function manage_orders( $id, $status = 'served' )
    {
        if ( $status == 'served')
        {
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }

        $this->_update( $id, $data, 'mdl_order_history' );
        redirect('orders/customer_orders');
    }

    public function history()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get everything
        $this->db->select( 'orders.id as oid, menu.id as mid, name, price, quantity, address, photo, created_date, order_history.id as id' );
        $this->db->join('orders', 'orders.id = order_history.order_id');
        $this->db->join('menu', 'orders.menu_id = menu.id');
        //echo $this->db->get_compiled_select('order_history');

        $result = $this->db->get('order_history')->result();
        //$this->debug( $result );
        $data   = $this->page_settings('list', $result, 'orders', 'Order History', 'orders');
        
        $this->templates->backend($data);
    }

    public function list()
    {
        if (!is_numeric($this->session->user_id)) {redirect('login');}
        //if id is not numeric then its not a specific item. get 
        $this->db->select( 'orders.id as oid, menu.id as mid, name, price, quantity, address, photo, created_date' );
        $this->db->join('menu', 'orders.menu_id = menu.id');
        $result = $this->_get();
        $data   = $this->page_settings('view', $result, 'orders', 'Scheduled Orders', 'orders');
        
        $this->templates->backend($data);
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $this->_delete($id, 'mdl_orders');
        }

        if ($this->input->get('redirect')) {
            redirect($this->input->get('redirect'));
        }
    }

    function process_orders()
    {
        
        $day = date('D', time());
        //get orders for the next hr
        $nxtHr = time() + ( 60 * 60) ;
        $time= date('H:', $nxtHr );
        //$this->debug( $time );
        $table_row = '';

        $this->db->select('*, users.id as uid, menu.id as mid, orders.id as oid, users.name as uname, order_history.id as ohid');
        $this->db->join('order_history', 'order_times.order_history_id = order_history.id');
        $this->db->join('users', 'users.id = order_history.user_id');
        $this->db->join('orders', 'orders.id = order_history.order_id');
        $this->db->join('menu', 'orders.menu_id = menu.id');

        $this->db->like([
            'time' => $time,
            'day' => $day
        ]);

        $result = $this->db->get('order_times')->result();
        
        if ( count($result) > 0 ){
        foreach ($result as $o) {

            if ( $o->balance > ($o->cost * $o->quantity) ) : //if the customer balance is enuf to purchase the product
                
                $table_row .=  "<tr>
                                    <td>$o->time</td>
                                    <td>$o->name</td>
                                    <td>$o->quantity</td>
                                    <td>$o->uname</td>
                                    <td>$o->address</td>
                                    <td>$o->phone</td>
                                </tr>";
            else:
                //try push notification here
                //TODO: Send SMS telling user he has ran out of cash. and should fund account.
                //Disable user from order_history
            endif;

        }
            
            //$this->debug($table_row);
            if ( !empty($table_row) ){
                $data['time'] = date('h:', time() ) .'00';
                $data['day']  = $day;
                $data['row']  = $table_row;
                //$this->debug($data);
                Modules::run('Mail/send_mail', $this->adminMail, $data, 'orders');
            }
            
        }

        
    }

    public function modal_create_order( $order_id)
    {
        $data['modal_title'] = 'Complete Order';
        $data['id'] = $order_id;
        $data['cost'] = $this->db->get_where('menu', ['id' => $order_id] )->row()->price;
        $this->load->view('create', $data);
    }

    public function modal_view_order_schedules( $order_id )
    {
        $data['id'] = $order_id;
        $this->db->join('orders', 'orders.id = order_times.order_id');
        $data['days'] = $this->db->get_where('order_times', ['order_id' => $order_id] )->result();
        $this->load->view('show_schedules', $data);
    }

    /*
     * AJAX FUNCTIONS
     * ========================================================================
     */

    public function ajax_add()
    {
        if ($this->form_validation->run($this, 'orders') == true) {
            //get data from post
            $data   = $this->_get_data_from_post();
            $return = [];
            //$data['photo'] = Modules::run('upload_manager/upload','image');

            $return['status'] = $this->mdl_orders->_insert($data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to insert data please try again';
            $return['node']   = [
                'orders' => $data['orders'],
                'slug'  => $data['orders_slug'],
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
                $data[] = ['orders' => $col->orders, 'id' => $col->order_id, 'slug' => $col->orders_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_validate_data()
    {
        /*
         * validates an item using type. like validating ann email or a ordername if it exists
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
        $id = $this->input->post('order_id'); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        $result = $this->_get_where_custom('parent_id', $id)->result();
        if (count($result) > 0) {
            foreach ($result as $col) {
                //do the extraction here and assign to $data
                $data[] = ['orders' => $col->orders, 'id' => $col->order_id, 'slug' => $col->orders_slug];
            }
        }

        echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        //$id = $this->input->get( 'order_id' ); //change this to match your data-id from ajax call
        if (!is_numeric($id)) {
            echo json_encode(['status' => false]);
            return;
        }

        if ($this->mdl_orders->_delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function ajax_edit()
    {
        $id                = $this->input->post('id');
        $data['orders']     = $this->input->post('orders');
        $data['parent_id'] = $this->input->post('parent');

        $return = ['status' => false];
        if (is_numeric($id)) {
            $return['status'] = $this->mdl_orders->_update($id, $data) ? true : false;
            $return['msg']    = $data['status'] ? null : 'An error occured trying to update data please try again';
        }
        echo json_encode($return);
    }

    /*
     * CRUD
     * =========================================================================
     */

    public function _get($order_by = '', $model = 'mdl_orders')
    {
        $query = $this->$model->get($order_by);
        return $query;
    }

    public function _get_where($id, $model = 'mdl_orders')
    {
        $query = $this->$model->get_where($id);
        return $query;
    }

    public function _get_where_custom($col, $value, $model = 'mdl_orders')
    {
        $query = $this->$model->get_where_custom($col, $value);
        return $query;
    }

    public function _insert($data, $model = 'mdl_orders')
    {
        if ($this->$model->_insert($data)) {
            $this->session->set_flashdata('success', 'New order was added successfully');
        } else {
            $this->session->set_flashdata('error', 'New order not added please try again');
        }
    }

    public function _update($id, $data, $model = 'mdl_orders')
    {

        if ($this->$model->_update($id, $data)) {
            $this->session->set_flashdata('success', 'Orders was updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Orders not updated please try again later');
        }
    }

    public function _delete($id, $model = 'mdl_orders')
    {
        if ($this->$model->_delete($id)) {
            $this->session->set_flashdata('success', 'Orders was deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Orders was not deleted successfully please try again later');
        }
        if ($model == 'mdl_orders') {
            redirect('orders');
        }
    }


    /*
     * HELPERS
     * ========================================================================
     */

    public function _get_data_from_post()
    {
        $data['menu_id']  = $this->input->post('menu_id');
        $data['cost']  = $this->input->post('cost');
        $data['quantity'] = $this->input->post('quantity');
        $data['user_id']  = $this->session->user_id;
        $data['address']  = $this->input->post('address');
        $data['time']     = $this->input->post('time');
        $data['created_date']     = time();

        if ( $this->input->post('available') !== NULL )
        {
            $data['days'] = $this->input->post('days');
        }

        return $data;
    }

    public function _get_data_from_db($id = null, $model = 'mdl_orders')
    {
        $returned = $this->$model->get_where($id)->row();

        $data['menu_id']    = $returned->menu_id;
        $data['quantity']   = $returned->quantity;
        $data['user_id']    = $returned->user_id;
        $data['address']    = $returned->address;
        $data['time']       = $returned->time;
        $data['created_date']= $returned->created_date;
        
        $days = $this->db->get_where('order_times', ['order_id' => $returned->id])->result_array();
        $data['days'] = $days;
        //$data['photo'] = $returned->image;
        return $data;
    }

    public function _submit_data()
    {
        //get data from post
        $data = $this->_get_data_from_post();

        $id = $this->uri->segment(3);
        if (is_numeric($id)) {
            $this->_update($id, $data);
            redirect($this->uri->segment(3) == 'edit' ? 'orders/profile' : 'orders');
        } else {
            
            if ( !empty( $data['days'] ) )
            {
                $days = $data['days'];
                unset( $data['days'] );
            }
            $cost = $data['cost'];
            unset( $data['cost'] );
            
            $time = $data['time'];
            unset( $data['time'] );

            $this->_insert($data);
            $lid = $this->db->insert_id();
            
            $this->db->insert('order_history', [
                'order_id' => $lid,
                'user_id'  => $this->session->user_id,
                'cost' => $cost
            ]);
            $ohid = $this->db->insert_id();
            if ( !empty($days) )
            {
                foreach ($days as $day => $k) {
                    $this->db->insert('order_times', [
                        'order_history_id' => $ohid,
                        'day'  => $day,
                        'time' => $time
                    ]);
                }
            }
           

            redirect('menus/orderes');
        }
    }

    public function get_dropdown_option($name, $selected, $extra, $where = null, $model = 'mdl_orders')
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
                $options[$datum->order_id] = $datum->orders;
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
