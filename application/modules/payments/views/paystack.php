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
                console.log(data);
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
                    payWithPaystack(info.node.trans_id, info.node.amount, amt, info.node.email, info.node.phone);
                }
            }
        });
    }
</script>

<script>
    function payWithPaystack(trans_id, amount, Oamount, email, phone) {
//	console.log($.fn);
//	if ( $.fn.PaystackPop === undefined)
//	{
//	    $('#msg').addClass('alert alert-danger');
//	    $('#msg').html('Transaction unsuccessful. Could not connect to host').fadeIn();
//	    $('#btnFund').html('Fund wallet');
//	    $('#btnFund').removeAttr('disabled');
//	    
//	    console.log('E3: cannot connect with host network paystack');
//	    return false;
//	}
        var handler = PaystackPop.setup({
            key: 'pk_test_36e0116c21494dc0cc105f6a36b372a29542bcd7',
            email: email,
            amount: amount,
            ref: trans_id,
            metadata: {
                custom_fields: [
                    {
                        display_name: "Customer Name",
                        variable_name: "name",
                        value: '<?= $this->session->name ?>'
                    },
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: phone
                    }
                ]
            },
            callback: function (response) {
                verify(response.reference, Oamount);
            },
            onClose: function () {
                $('#btnFund').html('Fund wallet');
                $('#btnFund').removeAttr('disabled');
            },
	    error: function(e)
	    {
		console.log('E4: '+e);
	    }
        });
        handler.openIframe();
    }


    function verify(reference, amt)
    {
        $.ajax({
            url: '<?= base_url('payments/ajax_verify_transaction') ?>',
            data: {trans_id: reference, amount: amt},
            type: 'POST',
            error: function (data) {
		$('#msg').addClass('alert alert-danger');
		$('#msg').html('An error occired please try again').fadeIn();
		$('#btnFund').html('Fund wallet');
		$('#btnFund').removeAttr('disabled');
		console.log('E5:');
		console.log(data);
     
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