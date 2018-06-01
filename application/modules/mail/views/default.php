<div class="nd-region">
    <div class="container-fluid">
	<div id="Content" class="row"> 
	    <div id="content" class="col-md-12 ">
		<div class="container">
		    <div class="row">
			<div class="col-md-8 col-md-offset-2">
			</div> 
		    </div>
		</div> 
		<div class="region region-content">
		    <div id="block-system-main" class="block block-system " >
			<div class="block-content clearfix">
			    <div id="node-7" class="node node-nd-page clearfix">
				<div class="content">
				    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
					
					<?php // require('assets/services.php'); ?>
					<?php require('assets/other-sections-2.php'); ?>
					<?php require('assets/about.php'); ?>
					<?php require('assets/other-sections-1.php'); ?>
					
					<section class="bg-dark page-section bg-scroll banner-section page-section"style="margin-top: 70px; padding-top: 0px; padding-bottom: 0px; background-image: url('assets/images/section-bg-2.jpg');"data-background="assets/images/section-bg-2.jpg"data-uri="assets/images/section-bg-2.jpg">


					    <div class="container relative">
						<div class="row">
						    <div class="col-sm-6">
							<div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
							    <div class="banner-content">
								<h3 class="banner-heading font-alt">
								    Join the contest Now!
								</h3>
								<div class="banner-decription"> 
								    Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Integer non dapibus diam, ac eleifend lectus. 
								</div>
								<div class="local-scroll">
								    <a class="btn btn-mod btn-w btn-medium btn-round" href="<?= base_url() ?>#contact">Lets talk</a>
								</div>
							    </div>
							</div>
						    </div>
						    <div class="col-sm-6 banner-image wow fadeInUp animated"style="visibility: visible; animation-name: fadeInUp;">
							<span ><img style="" src="assets/images/promo-1.png" alt="Alt" title="" /></span>
						    </div>
						</div>
					    </div>
					</section>
					
					<section class="bg-dark-alfa-90 page-section bg-scroll fullwidth-slider bg-scroll owl-carousel owl-theme banner-section page-section"data-background="<?= base_url('assets/img') ?>section-bg-3.jpg"data-uri="public://section-bg-3.jpg"style="background-image: url('<?= base_url('assets/img') ?>section-bg-3.jpg');">
					    <div class="container relative">
						<div class="row">
						    <div class="col-md-8 col-md-offset-2 align-center">
							<div class="medium-item"><div class="section-icon"><span class="icon-quote"></span></div><h3 class="small-title font-alt">What people say?</h3>
							    <blockquote class="testimonial">
								<p>Phasellus luctus commodo ullamcorper a posuere rhoncus commodo elit. Aenean congue, risus utaliquam dapibus. Thanks!</p>
								<footer class="testimonial-author"> John Doe, doodle inc. </footer></blockquote>
							</div>
						    </div>
						</div>
					    </div>
					    <div class="container relative">
						<div class="row">
						    <div class="col-md-8 col-md-offset-2 align-center">
							<div class="medium-item"><div class="section-icon"><span class="icon-quote"></span></div><h3 class="small-title font-alt">What people say?</h3>
							    <blockquote class="testimonial">
								<p>Phasellus luctus commodo ullamcorper a posuere rhoncus commodo elit. Aenean congue, risus utaliquam dapibus. Thanks!</p>
								<footer class="testimonial-author"> John Doe, doodle inc. </footer></blockquote>
							</div>
						    </div>
						</div>
					    </div>
					    <div class="container relative">
						<div class="row">
						    <div class="col-md-8 col-md-offset-2 align-center">
							<div class="medium-item"><div class="section-icon"><span class="icon-quote"></span></div><h3 class="small-title font-alt">What people say?</h3>
							    <blockquote class="testimonial">
								<p>Phasellus luctus commodo ullamcorper a posuere rhoncus commodo elit. Aenean congue, risus utaliquam dapibus. Thanks!</p>
								<footer class="testimonial-author"> John Doe, doodle inc. </footer></blockquote>
							</div>
						    </div>
						</div>
					    </div>
					</section>
					<?php require('assets/contestants.php'); ?>
					
					<div style="margin-top: 140px; margin-bottom: 140px;"><hr class="mt-0 mb-0"></div>
					<?php require('assets/sponsors.php') ?>
					<!-- creative ideas  here-->
					<?= Modules::run('blog/widget_latest_post', 'frontend', 3); ?>
					<?php require('assets/subscribe.php') ?>
					<div class="container"style="padding-top: 140px;">
					    <div class="row">
						<div class="col-sm-8 col-md-offset-2">
						    <h4 class="align-center font-alt uppercase"style="margin-bottom: 70px;">FIND US
						    </h4>
						    <div class="row">
							<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
							    <div class="contact-item"><div class="ci-icon"><i class="fa fa-phone"></i></div><div class="ci-title font-alt">Call Us</div><div class="ci-text">
								    <?= isset($contact['phone']) ? $contact['phone']:'' ?>
								</div></div>
							</div>
							<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
							    <div class="contact-item"><div class="ci-icon"><i class="fa fa-map-marker"></i></div><div class="ci-title font-alt">Address</div><div class="ci-text">
								    <?= isset( $contact['address'] ) ? $contact['address']:'' ?>
								</div></div>
							</div>
							<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
							    <div class="contact-item"><div class="ci-icon"><i class="fa fa-envelope"></i></div><div class="ci-title font-alt">Address</div><div class="ci-text">
								    <a href="<?= base_url() ?>mailto:<?= isset($contact['email']) ? $contact['email']:'' ?>"><?= isset($contact['email']) ? $contact['email']:'' ?></a>
								</div></div>
							</div>
						    </div>
						</div>
					    </div>
					</div>
				    </div> </div>

			    </div>
			</div>

		    </div> <!-- /.block -->
		</div>

	    </div>

	</div>

    </div>


</div>
