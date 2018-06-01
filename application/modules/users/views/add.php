

<!-- Booking Section -->
<section id="booking" class="booking">
    <div class="container text-center">

        <div class="row">
            <div class="form-holder col-md-10 col-md-push-1 text-center">
                <div class="ribbon">
                    <i class="fa fa-star"></i>
                </div>

                <h2>Signup now</h2>
                <h3>And make reservations</h3>

                <?= form_open('', 'class="w3-section" method="post" id="login-form"') ?>
				<?php
				if ($this->session->flashdata('error') != NULL) {
				    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
				}

				if ($this->session->flashdata('success') != NULL) {
				    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
				}
				?>
				<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
                    <div class="row">
                        <div class="col-md-10 col-md-push-1">
                            <div class="row">
                            	 <label for="name" class="col-sm-12 unique">Full Name
                                    <input name="fname" type="text" id="name" required value="<?= isset($fname) ? $fname : set_value('fname') ?>">
                                </label>
                                <label for="email" class="col-sm-6 unique">Email
                                    <input name="email" type="email" id="email" required  value="<?= isset($email) ? $email : set_value('email') ?>">
                                </label>
                                <label for="phone" class="col-sm-6 unique">Phone Number
                                    <input name="phone" type="text" id="phone" required value="<?= isset($phone) ? $phone : set_value('phone') ?>">
                                </label>
                                <label for="password" class="col-sm-6 unique">Password
                                    <input name="pswd" type="password" id="people" min="1" required>
                                </label>
                                <label for="confirm_password" class="col-sm-6 unique">Confirm Password
                                    <input name="pswd2" type="password" id="confirm_password" required>
                                </label>
                                
                                <div class="col-sm-12">
                                    <button type="submit" class="btn-unique">Signup Now</button>
                                </div>

                                <div class="col-sm-12" style="margin-top: 15px;"> 
                                <a href="<?= site_url('login') ?>" class="btn btn-link">I Already have an Account? Click Me</a>
                            	</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Booking Section -->

<script type="text/javascript">
    function toggle( event ) 
    {
	if ( event.checked === true )
	{
	    document.getElementById('submit').disabled = false;
	}else{
	    document.getElementById('submit').disabled = true;
	}
    }
</script>