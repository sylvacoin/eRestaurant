<div class="container">
<?= form_open_multipart('customizer/update_bg', 'method="post" class="form-horizontal"') ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>

    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Header Background </label>
	<div class="col-sm-9">
	    <div style="background-color: #ccc; width: 400px; height: 200px;">
		<img src="<?= base_url(). (isset($header_bg)?$header_bg:DEFAULT_IMG) ?>" class="img-fluid d-block" id="preview">
	    </div>
	    <label class="btn btn-primary br-0" for="pbg"><i class="fa fa-upload"></i> upload</label>
	    <input type="file" placeholder="Header BG" class="input-file" id="pbg" onchange="readURL(this, 'preview');" name="pbg">
	    <label class="btn-danger input-file-remove btn br-0" data-remove='pbg'>Remove</label>
	</div>
    </div>
    
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Parallax Background </label>
	<div class="col-sm-9">
	    <div style="background-color: #ccc; width: 400px; height: 200px; margin-bottom: 15px;">
		<img src="<?= base_url().(isset($secondary_bg)?$secondary_bg:DEFAULT_IMG) ?>" class="img-fluid" id="sbg-preview">
	    </div>
	    <label class="btn btn-primary br-0" for="sbg"><i class="fa fa-upload"></i> upload</label>
	    <input type="file" placeholder="Secondary background" class="input-file" id="sbg" onchange="readURL(this, 'sbg-preview');" name="sbg">
	    <label class="btn-danger input-file-remove btn br-0" data-remove="sbg">Remove</label>
	</div>
    </div>
    
<?= form_close(); ?>
</div>

<script>
//    function readURL(input, output)
//    {
//	if (input.files && input.files[0])
//	{
//	   var reader = new FileReader();
//	   
//	   reader.onload = function(e)
//	   {
//	       $(output).attr('src', e.target.result);
//	   };
//	   
//	   reader.readAsDataURL(input.files[0]);
//	}
//    }
</script>