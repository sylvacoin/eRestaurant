<!-- Footer -->
            <footer id="mainFooter" class="mainFooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 brief">
                            <div class="header">
                                <img src="<?= base_url() ?>assets/img/logo-footer.png" alt="italiano" width="100">
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>

                        <div class="col-md-4 contact">
                            <div class="header">
                                <h6>Contact</h6>
                            </div>
                            <ul class="contact list-unstyled">
                                <li><span class="icon-map text-primary"></span>Basioun, 23 July st, Egypt</li>
                                <li><a href="mailto:Italiano@Company.com"><span class="icon-phone text-primary"></span>Italiano@Company.com</a></li>
                                <li><span class="icon-mail text-primary"></span>9465 7675 294</li>
                                <li><span class="icon-printer text-primary"></span>333-999-666</li>
                            </ul>
                        </div>

                        <div class="col-md-4 newsletter">
                            <div class="header">
                                <h6>Newsletter</h6>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmo.</p>
                            <form action="#" id="subscribe" class="clearfix">
                                <input type="email" name="subscribtion-email" placeholder="Enter Your Email Address" class="pull-left">
                                <button type="submit" class="btn-unique has-border pull-left">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <ul class="social list-unstyled list-inline">
                        <li><a href="#" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" target="_blank" title="Skype"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>

                <div class="copyrights">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#">Policy Privacy</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-7">
                                <p>&copy; 2017 Italiano Restaurant. Template By <a href="https://bootstraptemple.com/" target="_blank">BootstrapTemple.com</a></p>
                                <!-- Please do not remove the backlink to us unless you have purchased the attribution-free license at https://bootstraptemple.com. It is part of the license conditions. Thanks for understanding :) -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

            <!-- scroll top btn -->
            <div id="scrollTop" class="btn-unique">
                <i class="fa fa-angle-up"></i>
            </div><!-- end scroll top btn -->


            <!-- moadal booking form -->
            <div class="reservation-overlay hidden-sm hidden-xs">
                <section id="reservation-modal" class="reservation-modal">
                    <div id="close"><i class="icon-close"></i></div>

                    <div class="container">
                        <div class="row">
                            <div class="form-holder col-md-12 text-center">
                                <h2>Signup now</h2>
                                <h3>And make reservations</h3>

                                <?= form_open('/signup', 'class="w3-section" method="post" id="login-form"') ?>
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
            </div><!-- end modal booking form -->
        </div>



        <script src="<?= base_url() ?>assets/js/jquery.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.ba-cond.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.slitslider.min.js"></script>
        <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/js/lightbox.min.js"></script>
        <script src="<?= base_url() ?>assets/js/datepicker.min.js"></script>
        <script src="<?= base_url() ?>assets/js/datepicker.en.min.js"></script>
        <script src="<?= base_url() ?>assets/js/timepicki.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?= base_url() ?>assets/js/smooth.scroll.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyC0dSWcBx-VghzhzQB6oCMTgeXMOhCYTvk"></script>
        <script src="<?= base_url() ?>assets/js/map.min.js"></script>
        <script src="<?= base_url() ?>assets/js/script.js"></script>
    </body>
</html>