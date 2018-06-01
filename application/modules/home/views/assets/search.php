<section class="hero">
    <div class="w3-container w3-center">
	<h2 class="hero-title">Find an Awesome Things Here</h2>
	<p class="hero-description hidden-xs">Find all things you need on <?= SITE_TITLE ?>. We give you a simple way.</p>
	<div class="row hero-search-box">
	    <?= form_open('search-products', 'method="post"'); ?>
	    <div class="w3-col m8">
		<div class="w3-content">
		    <div class="w3-col m6 s6 search-input  w3-mobile">
			<input class="w3-input input-lg search-first" placeholder="I want ..." type="text" name="s">
		    </div>
		    <div class="w3-col m6 s6 search-input w3-mobile">
			<?= Modules::run('states/get_dropdown_option', 'locale', NULL, 'class="w3-select input-lg search-second"') ?>
		    </div>
		    <div class="clearfix"></div>
		</div>
		
		<div class="w3-section advFilter">
		    <div class="w3-col m6 s6 search-input w3-mobile">
			<?php
			$price = [
			    0 => 'min price',
			    500 => '500',
			    1000 => '1,000',
			    10000 => '10,000',
			    50000 => '50,000',
			    150000 => '150,000'
			];
			echo form_dropdown('min', $price, NULL, 'class="w3-select"')
			?>
		    </div>
		    <div class="w3-col m6 s6 search-input w3-mobile">
			<?php
			$mprice = [
			    0 => 'max price',
			    500 => '500',
			    1000 => '1,000',
			    10000 => '10,000',
			    50000 => '50,000',
			    150000 => '150,000'
			];
			echo form_dropdown('max', $mprice, NULL, 'class="w3-select"')
			?>
		    </div>
		</div>
		<div class="w3-section advFilter">
		    <div class="w3-col m12 search-input  w3-mobile">
			<?= Modules::run('category/get_dropdown_option', 'cat', NULL, 'class="w3-select input-lg search-second"') ?>
		    </div>
		</div>
	    </div>

	    <div class="w3-col m2 s2 search-input  w3-mobile">
		<button class="w3-button w3-green w3-block w3-large" type="submit"><i class="fa fa-search"></i></button>
	    </div>
	    <div class="w3-col m2 s2 search-input  w3-mobile">
		<a href="javascript:void(0)" class="w3-button w3-green w3-block w3-large showFilter"><i class="fa fa-filter"></i></a>
	    </div>
	    <?= form_close(); ?>
	</div>
    </div>
</section>