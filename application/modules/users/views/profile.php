<div class="w3-col l6 s12 w3-container w3-mobile">
    <div class="w3-card-4 w3-white">
	<header class="w3-container w3-border-bottom w3-border-light-grey">
	    <h4 class="w3-left">User profile</h4>
	    <div class="w3-right w3-container w3-section">
		<a href="<?= site_url('users/profile/edit') ?>" class="w3-btn-floating w3-border w3-white"><i class="fa fa-pencil fa-fw"></i></a>
	    </div>
	</header>

	<div class="w3-container w3-section">
	    <div class="w3-col l3 s12 w3-block w3-center">
		<img src="<?php echo $this->session->photo ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:100px">
	    </div>
	    <div class="w3-col l9 s12">
		<div class="w3-section">
		    <ul class="list-inline two-part">
			<li><strong>Full Name</strong></li>
			<li><?= isset($user->firstname, $user->lastname) ? $user->firstname . ' ' . $user->lastname : '' ?></li>

			<li><strong>Email Address</strong></li>
			<li> <?= isset($user->email) ? $user->email : '' ?> </li>

			<li><strong>Phone number</strong></li>
			<li> <?= isset($user->phone) ? $user->phone : '' ?> </li>

			<li><strong>Business type</strong></li>
			<li> <?= isset($biz->is_company) && $biz->is_company == 1 ? 'Company (registered)' : 'Individual (not registered)'; ?> </li>
		    </ul>
		</div>
	    </div>
	</div>
    </div>

    <div class="w3-card-4 w3-white">
	<header class="w3-container w3-border-bottom w3-border-light-grey">
	    <h4 class="w3-left">Business Profile</h4>
	    <div class="w3-right w3-container w3-section">
		<a href="<?= site_url('users/business_profile/edit') ?>" class="w3-btn-floating w3-border w3-white"><i class="fa fa-pencil fa-fw"></i></a>
	    </div>
	</header>

	<div class="w3-container w3-section">
	    <div class="w3-col l3 s12 w3-block w3-center">
		<img src="<?= isset($biz->logo) ? base_url() . $biz->logo : base_url() . DEFAULT_LOGO ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:100px">
	    </div>
	    <div class="w3-col l9 s12">
		<div class="w3-section">
		    <label>Business Name</label>
		    <div class="w3-content">
			<p> 
			    <?= isset($biz->business_name) ? $biz->business_name : '' ?> 
			</p>
			<hr>
			<div class="w3-section">
			    <div class="w3-content">
				<p> 
				    <?= isset($biz->description) ? $biz->description : 'Not specified' ?> 
				</p>
			    </div>
			</div>
		    </div>

		</div>
	    </div>
	</div>
    </div>
</div>
<div class="w3-col l6 s12 w3-container w3-mobile">

    <div class="w3-card-4 w3-white w3-mobile">
	<header class="w3-container w3-border-bottom w3-border-light-grey">
	    <h3 class="w3-left">Business Contact information</h3>
	</header>

	<div class="w3-container w3-section">
	    <div class="w3-section">
		<div class="w3-content">
		    <p> <i class="fa fa-fw fa-phone"></i> &nbsp;
			<?= isset($biz->phone) ? $biz->phone : 'Not specified' ?> 
		    </p>
		    <hr>
		</div>
	    </div>
	    <div class="w3-section">
		<div class="w3-content">
		    <p> <i class="fa fa-fw fa-envelope"></i> &nbsp;
			<?= isset($biz->email) ? $biz->email : 'Not specified' ?> 
		    </p>
		    <hr>
		</div>
	    </div>
	    <div class="w3-section">
		<div class="w3-content">
		    <p> <i class="fa fa-fw fa-globe"></i> &nbsp;
			<?= isset($biz->website) ? $biz->website : 'Not specified' ?> 
		    </p>
		    <hr>
		</div>
	    </div>
	    <div class="w3-section">
		<div class="w3-content">
		    <p> <i class="fa fa-fw fa-map-marker"></i> &nbsp;
			<?= isset($biz->address) ? $biz->address : 'Not specified' ?> 
		    </p>
		    <hr>
		</div>
	    </div>

	    <?php if (isset($biz->address)): ?>
    	    <div class="w3-section">
    		<h4>Location</h4>
    		<div class="w3-content">
    		    <ul class="list-inline two-part">
    			<li><strong>Country</strong></li>
    			<li><?= isset($biz->country) ? $biz->country : 'N/A' ?></li>

    			<li><strong>State</strong></li>
    			<li> <?= isset($biz->state) ? $biz->state : 'N/A' ?> </li>

    			<li><strong>Local government</strong></li>
    			<li> <?= isset($biz->lga) ? $biz->lga : 'N/A' ?> </li>

    			<li><strong>Town</strong></li>
    			<li> <?= isset($biz->town) ? $biz->town : 'Not specified' ?> </li>
    		    </ul>
    		</div>
    	    </div>
	    <?php endif; ?>
	</div>
    </div>
</div>
