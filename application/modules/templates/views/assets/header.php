<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- IE Compatibility meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Description meta -->
        <meta name="description" content="...">
        <!-- Author meta -->
        <meta name="author" content="Bootstrap Temple">

        <!-- Page Title -->
        <title>Italiano Restaurant - Bootstrap Template from the Bootstrap Temple</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <!-- Custom font icons -->
        <link rel="stylesheet" href="https://file.myfontastic.com/6AeAYiqp5KBjSiZ2tE8WJW/icons.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Slider -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/slider.min.css">
        <!-- Lightbox Pop up -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/lightbox.min.css">
        <!-- Datepicker -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/datepicker.min.css">
        <!-- Datepicker -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/timepicki.min.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.default.css">
        <!-- Modernizr -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/modernizr.custom.79639.min.js"></script>
    </head>
    <body>

        <div class="page-holder">
            <!-- Navbar -->
            <header class="header">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header"><a href="<?= base_url() ?>/index.html" class="navbar-brand"><img src="<?= base_url() ?>assets/img/logo.png" alt="Italiano" width="100"></a>
                            <div class="navbar-buttons">
                                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
                            </div>
                        </div>
                        <div id="navigation" class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?= site_url('') ?>#hero">Home</a></li>
                                <li><a href="<?= site_url('') ?>#about">About</a></li>
                                <li><a href="<?= site_url('') ?>#services">Services</a></li>
                                <li><a href="<?= site_url('') ?>#dishes">Dishes</a></li>
                                <li><a href="<?= site_url('') ?>#menu">Menu</a></li>
                                <li><a href="<?= site_url('') ?>#gallery">Gallery</a></li>
                                <li><a href="<?= site_url('login') ?>">Login</a></li>
                            </ul>
                            <a href="#" class="btn navbar-btn btn-unique hidden-sm hidden-xs" id="open-reservation">Make a Reservation</a>
                        </div>
                    </div>
                </nav>
            </header><!-- End Navbar -->