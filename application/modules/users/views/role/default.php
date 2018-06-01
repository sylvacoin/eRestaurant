
    <div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-body no-padding">
		    <?php echo $this->load->view('add') ?>
			</div>
		</div>
    </div>
    <div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-body no-padding">
			    <?php
			    if ($this->session->flashdata('error') != NULL) {
				echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
			    }

			    if ($this->session->flashdata('success') != NULL) {
				echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
			    }
			    ?>
				<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
			   <?php echo Modules::run('users/role/view') ?>
			</div>
		</div>
    </div>
    <div class="clearfix"></div>


				