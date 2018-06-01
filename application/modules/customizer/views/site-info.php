<div class="container">
<?= form_open_multipart('customizer/update_site_info', 'method="post"') ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
	<label class="form-control-label col-sm-3">Site Name</label>
	<input type="text" name="sitename" placeholder="Site Name" class="form-control col-sm-9" value="<?= isset($sitename)?$sitename:'' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Tag line</label>
	<input type="text" name="tag" placeholder="Tag line" class="form-control col-sm-9" value="<?= isset($tag)?$tag:'' ?>">
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Logo</label>
	<div class="col-sm-9">
	    <div class="d-block hidden-sm-up" style="width:200px;height:200px;border:.1px solid #ccc;margin-bottom:5px;">
		<img src="<?= base_url().(isset($logo)?$logo:DEFAULT_IMG) ?>" class="img-fluid d-block w-100" id="logoPrev">
	    </div>
	    <label class="btn btn-primary br-0" for="file"><i class="fa fa-upload"></i> Logo</label>
	    <input name="logo" type="file" placeholder="logo" class="input-file" id="file" onchange="readURL(this, 'logoPrev');">
	    <label class="btn-danger input-file-remove btn br-0">Remove</label>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Favicon</label>
	<div class="col-sm-9">
	    <div style="width:100px;height:100px;border:.1px solid #ccc;margin-bottom:5px;">
		<img src="<?= base_url(). (isset($fav)?$fav:DEFAULT_IMG) ?>" class="img-fluid" id="favPrev">
	    </div>
	    <label class="btn btn-primary br-0" for="favfile"><i class="fa fa-upload"></i> upload favicon</label>
	    <input onchange="readURL(this, 'favPrev');" name="fav" type="file" placeholder="favicon" class="input-file" id="favfile">
	    <label class="btn-danger input-file-remove btn br-0">Remove</label>
	</div>
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Site Description</label>
	<textarea name="descr" placeholder="Site description" class="form-control col-sm-9"><?= isset($description)?$description:'' ?></textarea>
    </div>
    
</form>
</div>