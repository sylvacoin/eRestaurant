<?php
//if user has no role then assign user default role
$default_role_id = Modules::run('users/role/get_default_role');

$role = !is_numeric($this->session->role) ? $default_role_id : $this->session->role;

//get role privileges 
$priv = Modules::run('users/role/get_role_privilege', $role );

if ( $priv === "")
{
    $priv = [];
}

?>
<div class="left-side sticky-left-side">

	<!--logo and iconic logo start-->
	<div class="logo">
		<h1><a href="index.html">e<span>Restaurant</span></a></h1>
	</div>
	<div class="logo-icon text-center">
		<a href="index.html"><i class="lnr lnr-home"></i> </a>
	</div>

	<!--logo and iconic logo end-->
	<div class="left-side-inner">

		<!--sidebar nav start-->
			<ul class="nav nav-pills nav-stacked custom-nav">
				<li class="active"><a href="index.html"><i class="lnr lnr-layers"></i><span>Dashboard</span></a></li>
				<?php if ( array_key_exists('cm_site', $priv) ): ?>
				<li><a href="<?= site_url('menus') ?>"><i class="lnr lnr-dinner"></i> <span>Manage Menus</span></a></li>
				<li class="menu-list"><a href="#"><i class="lnr lnr-store"></i> <span>Orders</span></a>
					<ul class="sub-menu-list">
						<li><a href="<?= site_url('orders/customer_orders/') ?>">All Orders</a> </li>
						<li><a href="<?= site_url('orders/customer_orders') ?>">Pending Orders</a></li>
						<li><a href="<?= site_url('orders/customer_orders/not-active') ?>">Completed Orders</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="lnr lnr-users"></i> <span>Users</span></a></li>
				<li class="menu-list">
					<a href="#"><i class="lnr lnr-cog"></i>
						<span>Components</span></a>
						<ul class="sub-menu-list">
							<li><a href="<?= site_url('role') ?>">Roles</a> </li>
							<li><a href="widgets.html">Configuration</a></li>
						</ul>
				</li>
				<?php endif; ?>
				<li><a href="#"><i class="lnr lnr-map"></i> <span>Address</span></a></li>
				<li><a href="<?= site_url('menus/dishes') ?>"><i class="lnr lnr-dinner"></i> <span>Dishes/Menu</span></a></li>              
				<li class="menu-list"><a href="#"><i class="lnr lnr-history"></i> <span>My Orders</span></a>
					<ul class="sub-menu-list">
						<li><a href="<?= site_url('orders/history') ?>">Order History</a> </li>
						<li><a href="<?= site_url('orders/list') ?>">Scheduled Orders</a></li>
					</ul>
				</li>      
				<li class="menu-list"><a href="#"><i class="lnr lnr-indent-increase"></i> <span>Menu Levels</span></a>  
					<ul class="sub-menu-list">
						<li><a href="<?= site_url('payments/fund_demo') ?>">Fund Account</a> </li>
					</ul>
				</li>
				<li><a href="#"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
				<li><a href="<?= site_url('logout') ?>"><i class="lnr lnr-power-switch"></i> <span>Logout</span></a></li>
			</ul>
		<!--sidebar nav end-->
	</div>
</div>