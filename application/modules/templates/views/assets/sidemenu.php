<?php extract(Modules::run('customizer/init_settings')); ?>
<!-- Menu -->
<nav class="menu" id="theMenu"><!-- Menu button -->
    <div id="menuToggle"><i class="fa fa-bars"></i></div>

    <div class="menu-wrap" id="main-menu">
	<h1 class="logo"><a href="<?= site_url() ?>">Dimconnect</a></h1>

	<a href="<?= site_url() ?>#headerwrap">Home</a>
	<a href="<?= site_url() ?>#about">About</a>
	<a href="<?= site_url() ?>#services">Services</a>
	<a href="<?= site_url() ?>#products">Products</a>
	<a href="<?= site_url() ?>#portfolio">Portfolio</a>
	<a href="#contact">Contact</a>

	<?php if ( isset($socials->fb)): ?>
	<a href="<?= $socials->fb ?>"><i class="fa fa-facebook"></i></a>
	<?php endif; ?>
	<?php if ( isset($socials->tw)): ?>
	<a href="<?= $socials->tw ?>"><i class="fa fa-twitter"></i></a>
	<?php endif; ?>
	<?php if ( isset($socials->ig)): ?>
	<a href="<?= $socials->ig ?>"><i class="fa fa-instagram"></i></a>
	<?php endif; ?>
	<?php if ( !is_numeric($this->session->user_id)): ?>
	<a href="<?= site_url('login') ?>"><i class="fa fa-lock"></i></a>
	<?php else: ?>
	<a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i></a>
	<?php endif; ?>
    </div>


</nav>