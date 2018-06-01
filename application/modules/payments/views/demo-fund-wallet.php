<div class="col-sm-4 col-xs-12">
<div class="panel-body1">
		<?= form_open('', 'class="" method="post"') ?>
		<?php
		if ($this->session->flashdata('error') != NULL) {
		    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
		}

		if ($this->session->flashdata('success') != NULL) {
		    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
		}
		?>
		<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
		<div id="msg"></div>
		<div class="alert alert-info">
		    <p>Enter the amount you would like to be funded to your wallet.</p>
		</div>
		<div class="form-group">
		    <input class="form-control1" type="text" value="45" id="amt" name="amt" placeholder="Amount">
		</div>
		<div class="form-group">
		    <button type="button" onclick="processPayment()" class="btn btn-primary" id="btnFund"> Fund wallet
		    </button> 
		</div>
		<?= form_close() ?>
	    
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
	obj = new myObject();
	
	function myObject(){}
	
	myObject.VAT = 4;
	myObject.units = $('#unit');
	myObject.amt = $('#amt');
	
	myObject.prototype.calculate = () =>{ 
	    var _proto = myObject;
	    
	    if ( $.trim( _proto.amt.val()) !== "" && !isNaN( _proto.amt.val()) )
	    {
		_proto.units.val( (_proto.amt.val() / _proto.VAT) +" units" );
	    }else{
		_proto.units.val( 0+" units" );
	    }
	}
	obj.calculate();
	
	$(document).on('keyup', '#amt', function(){
	    obj.calculate();
	});
    });
</script>
<?php echo Modules::run('payments/init', 'demo'); ?>