<!-- MAIN IMAGE SECTION -->
<div id="page-headerwrap">
    <div class="container">
	<div class="row">
	    <div class="col-lg-12  align-items-center">

		<div class="row">
		    <div class="col-lg-4">
			<h1 class="fw-600 xxlarge pt-100 white wow fadeIn" data-wow-duration="1.5s" data-wow-delay="200ms">Contact us</h1>
		    </div>
		    <div class="col-lg-8 wow fadeInRight" data-wow-duration="2s" data-wow-delay="200ms">
		    </div>
		</div>
	    </div>
	</div><!-- row -->
    </div><!-- /container -->
</div><!-- /headerwrap -->

<!-- WELCOME SECTION -->
<section id="about" class="about">
    <div class="container">
	<div class="row pt pt-50">

	    <div class="col-lg-12 wow fadeIn" data-wow-duration=".3s" data-wow-delay="200ms">
		<p>Dimconnect is Nigeria's ICT company which delivers solutions to problems using powerful tools. Have any idea or need any application either web, software and or graphic? we can do that. </p>
	    </div>
	</div><!-- /row -->

	<div class="row pt-100">
	    <div class="main_about_area sections">
		<div class="col-sm-12">

		    <div class="main_about_content">
			<div class="row">

			    <div class="col-sm-6 wow fadeInUp no-gutters" data-wow-duration="1s" data-wow-delay=".3s">
				<div class="single_about_right_content">
				    <div class="single_about">
					<div class="single_ab_icon">
					    <div class="ab_border_right"></div>
					    <i class="fa fa-envelope"></i>
					</div>
					<div class="single_ab_text">
					    <h3>MAIL US</h3>
					    <p><?= isset($mail) ? $mail : '' ?></p>
					</div>
				    </div>
				</div>
			    </div>
			    <div class="col-sm-6 wow fadeInUp no-gutters" data-wow-duration="1s" data-wow-delay=".5s">
				<div class="single_about_right_content">
				    <div class="single_about">
					<div class="single_ab_icon">
					    <i class="fa fa-phone"></i>
					</div>
					<div class="single_ab_text">
					    <h3>CALL US</h3>
					    <?php if (isset($phone)): ?>
    					    <p><?= isset($phone[0]) ? $phone[0] : '' ?>,
						    <?= isset($phone[1]) ? $phone[1] : '' ?>,
						    <?= isset($phone[2]) ? $phone[2] : '' ?>
    					    </p>
					    <?php endif; ?>
					</div>
				    </div>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>

	</div>
    </div><!-- /row -->
</div><!-- /.container -->
</section>
