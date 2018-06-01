<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:100px;"><img src="<?php echo base_url() ?>assets/img/static/preloader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function (response)
            {
                jQuery('#modal_ajax .modal-body').html(response);
		if ( $.fn.dataTable !== undefined )
		{
		    var option = {'iDisplayLength':5};
		    $('.modal-table').dataTable(option);
		}
            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<!-- Login modal -->
<div id="modal_ajax" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
		<h3 class="text-left"><?= isset($modal_title) ? $modal_title : SITENAME ?></h3>
	    </div>
	    <div class="modal-body" style="min-height: 300px;">
		
	    </div> <!--/Modal body-->
	</div> <!-- Modal content-->
    </div> <!-- /.modal-dialog -->
</div> <!-- //Login modal -->
</div> <!-- //login -->

 <script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	</script>
    

<!-- Login modal -->
<div id="modal-4" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
		<h1 class="text-left"><?= isset($modal_title) ? $modal_title : 'Delete' ?></h1>
	    </div>
	    <div class="modal-body" style="min-height: 100px;">
		<p class="text-center">Are you sure to delete this information ?</p>
	    </div> <!--/Modal body-->
	    <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
		<a href="#" class="btn btn-danger" id="delete_link">delete</a>
		<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
	    </div>
	</div> <!-- Modal content-->
    </div> <!-- /.modal-dialog -->
</div> <!-- //Login modal -->
</div> <!-- //login -->
    