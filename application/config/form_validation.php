<?php
$config = array(
	'signup' => array(
		array(
			'field' => 'fname',
			'label' => 'Full Name',
			'rules' => 'required',
		),
		array(
			'field' => 'phone',
			'label' => 'Phone number',
			'rules' => 'required',
		),
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'required',
			'errors' => array(
				'is_unique' => 'This %s already exists please choose another',
			),
		),
		array(
			'field' => 'pswd',
			'label' => 'Password',
			'rules' => 'required',
		),
		array(
			'field' => 'pswd2',
			'label' => 'Password Confirmation',
			'rules' => 'required|matches[pswd]',
		),
	),
	'portfolio' => array(
		array(
			'field' => 'name',
			'label' => 'Portfolio name',
			'rules' => 'required',
		),
		array(
			'field' => 'descr',
			'label' => 'Description',
			'rules' => 'required',
		),
		array(
			'field' => 'cat',
			'label' => 'Category',
			'rules' => 'required',
		),
	),
	'filemanager' => array(
		array(
			'field' => 'name',
			'label' => 'App name',
			'rules' => 'required',
		),
		array(
			'field' => 'descr',
			'label' => 'Description',
			'rules' => 'required',
		),
		array(
			'field' => 'cat',
			'label' => 'Category',
			'rules' => 'required',
		),
	),
	'menus' => array(
		array(
			'field' => 'name',
			'label' => 'Dish name',
			'rules' => 'required',
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required',
		),
		array(
			'field' => 'price',
			'label' => 'Price',
			'rules' => 'required',
		)
	),
	'orders' => array(
		array(
			'field' => 'address',
			'label' => 'Delivery Address',
			'rules' => 'required',
		),
		array(
			'field' => 'time',
			'label' => 'Delivery Time',
			'rules' => 'required',
		)
	),
	'testimonials' => array(
		array(
			'field' => 'name',
			'label' => 'user name',
			'rules' => 'required',
		),
		array(
			'field' => 'testimony',
			'label' => 'testimony',
			'rules' => 'required',
		),
	),
	'clients' => array(
		array(
			'field' => 'client',
			'label' => 'clients',
			'rules' => 'required',
		),
	),
	'widgets-contactus' => array(
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'required',
		),
		array(
			'field' => 'message',
			'label' => 'Message',
			'rules' => 'required',
		),
	),
	'states' => array(
		array(
			'field' => 'state',
			'label' => 'State',
			'rules' => 'required',
		),
		array(
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required',
		),
	),
	'country' => array(
		array(
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required',
		),
	),
	'location' => array(
		array(
			'field' => 'state',
			'label' => 'States',
			'rules' => 'required',
		),
		array(
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required',
		),
		array(
			'field' => 'lga',
			'label' => 'Local government area',
			'rules' => 'required',
		),
	),
	'login' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|callback_authenticate',
		),
		array(
			'field' => 'pswd',
			'label' => 'Password',
			'rules' => 'required',
		),
	),
	'alogin' => array(
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'required|callback_authenticate_admin',
		),
		array(
			'field' => 'pswd',
			'label' => 'Password',
			'rules' => 'required',
		),
	),
	'recovery' => array(
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'required|callback_validate_email',
		),
	),
	'category' => array(
		array(
			'field' => 'catname',
			'label' => 'Category name',
			'rules' => 'required',
		),
	),
	'products' => array(
		array(
			'field' => 'product',
			'label' => 'Product name',
			'rules' => 'required',
		),
		array(
			'field' => 'price',
			'label' => 'Product price',
			'rules' => 'required',
		),
		array(
			'field' => 'subcat',
			'label' => 'Product category',
			'rules' => 'required',
		),
	),
	'transaction' => array(
		array(
			'field' => 'amount',
			'label' => 'Amount',
			'rules' => 'required',
		),
	),
	'business' => array(
		array(
			'field' => 'cat',
			'label' => 'Category Name',
			'rules' => 'required',
		),
		array(
			'field' => 'subcat',
			'label' => 'Sub Category Name',
			'rules' => 'required',
		),
		array(
			'field' => 'bname',
			'label' => 'Business Name',
			'rules' => 'required',
		),
		array(
			'field' => 'baddr',
			'label' => 'Business Address',
			'rules' => 'required',
		),
		array(
			'field' => 'boname',
			'label' => 'Business Owner name',
			'rules' => 'required',
		),
	),
	'analytics' => array(
		array(
			'field' => 'item',
			'label' => 'item',
			'rules' => 'required',
		),
		array(
			'field' => 'id',
			'label' => 'Product ID',
			'rules' => 'required',
		),
	),
);
