

<!-- Booking Section -->
<section id="booking" class="booking">
    <div class="container text-center">

        <div class="row">
            <div class="form-holder col-md-10 col-md-push-1 text-center">
                <div class="ribbon">
                    <i class="fa fa-star"></i>
                </div>

                <h2>Login to make an order</h2>

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
                                <label for="email" class="col-sm-6  col-sm-offset-3 unique">Email
                                    <input name="email" type="email" id="email" required>
                                </label>
                                <label for="number" class="col-sm-6  col-sm-offset-3 unique">Password
                                    <input name="pswd" type="password" id="password" required>
                                </label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn-unique">Login Now</button>
                                </div>
                                <div class="col-sm-12" style="margin-top: 15px;"> 
                                <a href="<?= site_url('signup') ?>" class="btn btn-link">Signup Now</a> <a href="<?= site_url('forgot-password') ?>" class="btn btn-link">Forgot password</a>
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