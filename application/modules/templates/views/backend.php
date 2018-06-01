<!DOCTYPE HTML>
<html>
<head>
<title><?= isset($page_title) ? $page_title.' | '.SITENAME : SITENAME ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?= base_url() ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet"> 
<link href="<?= base_url() ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->



<!--animate-->
<link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?= base_url() ?>assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="<?= base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?= base_url() ?>assets/js/jasny-bootstrap.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
</head> 
   
 <body class="sticky-header left-side-collapsed">
    <section>
    	<!-- left side start-->
		<?php $this->load->view('assets/backend-sidemenu') ?>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<?php $this->load->view('assets/backend-header') ?>
			<div id="page-wrapper">
				
			<!--body wrapper start-->
				<?php

					if (!isset($view_file)) {
					$view_file = "";
					}

					if (!isset($module)) {
					$module = $this->uri->segment(1);
					}

					if ($view_file != "" && $module != "") {
					$path = $module . '/' . $view_file;
					$this->load->view($path);
					} else {
					echo nl2br($body);
					}
				?>
			</div>
			 <!--body wrapper end-->
		</div>
<?php $this->load->view('assets/footer'); ?>