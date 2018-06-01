<?php init_js_imgUploadPreview() ?>

<!-- Form Elements -->
<section class="forms"> 
    <div class="container-fluid">
	<div class="card">
	    <div class="card-header">
		<ul role="tablist" class="nav nav-tabs float-right" id="myTab">
		    <li class="nav-item">
			<a href="#appearance" class="nav-link active" aria-controls="appearance" aria-selected="true" role="tab" data-toggle="tab" id="appearance-tab">Site Appearance</a>
		    </li>
		    <li class="nav-item">
			<a href="#main" class="nav-link" aria-controls="main" aria-selected="false" role="tab" data-toggle="tab" id="main-tab">Site Info</a>
		    </li>
		    <li class="nav-item">
			<a href="#socials" class="nav-link" aria-controls="socials" aria-selected="false" role="tab" data-toggle="tab" id="socials-tab">Socials</a>
		    </li>
		   <li class="nav-item">
			<a href="#seo" class="nav-link" aria-controls="seo" aria-selected="false" role="tab" data-toggle="tab" id="seo-tab">Meta Tags / SEO</a>
		    </li>
		    <li class="nav-item">
			<a href="#contacts" class="nav-link" aria-controls="contacts" aria-selected="false" role="tab" data-toggle="tab" id="contacts-tab">Contacts</a>
		    </li>
		    <li class="nav-item">
			<a href="#services" class="nav-link" aria-controls="services" aria-selected="false" role="tab" data-toggle="tab" id="services-tab">Services</a>
		    </li>
		    <li class="nav-item">
			<a href="#content" class="nav-link" aria-controls="content" aria-selected="false" role="tab" data-toggle="tab" id="content-tab">Site content</a>
		    </li>
		</ul>
	    </div>
	    <div class="card-body">
		<?php
		if ($this->session->flashdata('error') != NULL) {
		    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
		}

		if ($this->session->flashdata('success') != NULL) {
		    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
		}
		?>
		<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
		<div class="tab-content" id="myTabContent">
		    <div class="tab-pane show active" role="tabpanel" aria-labelledby="appearance-tab" id="appearance">
			<?= $this->load->view('appearance'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="main-tab" id="main">
			<?= $this->load->view('site-info'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="socials-tab" id="socials">
			<?= $this->load->view('socials'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="seo-tab" id="seo">
			<?= $this->load->view('meta'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="contacts-tab" id="contacts">
			<?= $this->load->view('contact'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="services-tab" id="services">
			<?= $this->load->view('services'); ?>
		    </div>
		    <div class="tab-pane" role="tabpanel" aria-labelledby="content-tab" id="content">
			<?= $this->load->view('site-content'); ?>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</section>

