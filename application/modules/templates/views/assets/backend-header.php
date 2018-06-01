<!-- header-starts -->
<div class="header-section">
 
	<!--toggle button start-->
	<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
	<!--toggle button end-->

	<!--notification menu start -->
	<div class="menu-right">
		<div class="user-panel-top">  	
			<div class="profile_details_left">

			</div>
			<div class="profile_details">		
				<ul>
					<li class="dropdown profile_details_drop">
						<a href="<?= base_url() ?>assets/#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<div class="profile_img">	
								<span style="background:url(<?= base_url() ?>assets/images/1.jpg) no-repeat center"> </span> 
								 <div class="user-name">
								 	<?php if ( !empty( $this->session->user_id ) ): ?>
									<p><?= $this->session->name ?><span><?= Modules::run('users/role/get_role_name', $this->session->role) ?></span></p>
									<?php else: ?>
									<p>Michael 2<span>Administrator</span></p>
									<?php endif; ?>
								 </div>
								 <i class="lnr lnr-chevron-down"></i>
								 <i class="lnr lnr-chevron-up"></i>
								<div class="clearfix"></div>	
							</div>	
						</a>
						<ul class="dropdown-menu drp-mnu">
							<li> <a href="<?= site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
						</ul>
					</li>
					<div class="clearfix"> </div>
				</ul>
			</div>		
			<div class="social_icons">
				<div class="col-md-4 social_icons-left">
					<a href="<?= base_url() ?>assets/#" class="yui"><i class="fa fa-facebook i1"></i><span>300<sup>+</sup> Likes</span></a>
				</div>
				<div class="col-md-4 social_icons-left pinterest">
					<a href="<?= base_url() ?>assets/#"><i class="fa fa-google-plus i1"></i><span>500<sup>+</sup> Shares</span></a>
				</div>
				<div class="col-md-4 social_icons-left twi">
					<a href="<?= base_url() ?>assets/#"><i class="fa fa-twitter i1"></i><span>500<sup>+</sup> Tweets</span></a>
				</div>
				<div class="clearfix"> </div>
			</div>            	
			<div class="clearfix"></div>
		</div>
	  </div>
	<!--notification menu end -->
</div>
<!-- //header-ends -->