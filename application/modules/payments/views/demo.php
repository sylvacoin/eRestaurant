<script>
    function processPayment()
    {
	
	var $vat = 0.02;
        $('#btnFund').html('<i class="fa fa-spinner fa-spin"></i> Processing');
        $('#btnFund').attr('disabled', true);
        var amt = $('#amt').val();
	
	if ( amt < 5 || amt === undefined || isNaN(amt) )
	{
	    $('#msg').addClass('alert alert-danger');
	    $('#msg').html('Please enter a valid amount').fadeIn();
	    $('#btnFund').html('Fund wallet');
	    $('#btnFund').removeAttr('disabled');
	    console.log('E0: Invalid amount');
	    return false;
	}
	
        var vat = ( $vat * amt);
        var total = parseFloat(amt, 10) + parseFloat(vat, 10);
        $.ajax({
            url: '<?= base_url('payments/ajax_add_transaction') ?>',
            data: {amount: amt},
            type: 'POST',
            error: function (data) {
                $('#msg').addClass('alert alert-danger');
                $('#msg').html('Payment failed').fadeIn();
		$('#btnFund').html('Fund wallet');
                $('#btnFund').removeAttr('disabled');
                console.log(data.responseText);
            },
            success: function (data) {
                var info = JSON.parse(data);
                if (info.status == 'false')
                {
		    $('#msg').addClass('alert alert-danger');
		    $('#msg').html('Payment failed').fadeIn();
		    $('#btnFund').html('Fund wallet');
		    $('#btnFund').removeAttr('disabled');
		    console.log('E2:');
		    console.log(data);
                } else {
                    verify(info.node.trans_id, amt)
                }
            }
        });
    }
</script>

<script>

    function verify(reference, amt)
    {
        $.ajax({
            url: '<?= base_url('payments/ajax_verify_demo_transaction') ?>',
            data: {trans_id: reference, amount: amt},
            type: 'POST',
            error: function (data) {
		$('#msg').addClass('alert alert-danger');
		$('#msg').html('An error occured please try again').fadeIn();
		$('#btnFund').html('Fund wallet');
		$('#btnFund').removeAttr('disabled');
		console.log('E5:');
		console.log(data.responseText);
     
            },
            success: function (data) {
                var info = JSON.parse(data);
                if (info.status == 'true')
                {
		    $('#msg').addClass('alert alert-success');
		    $('#msg').html(info.msg).fadeIn();
		    $('#btnFund').html('Fund wallet');
		    $('#btnFund').removeAttr('disabled');
                } else {
                    $('#msg').addClass('alert alert-danger');
		    $('#msg').html(info.msg).fadeIn();
		    $('#btnFund').html('Fund wallet');
		    $('#btnFund').removeAttr('disabled');
                }
                window.setTimeout(function () {
                    window.location = baseurl + 'dashboard';
                }, 5000);

            }
        });
    }
</script>