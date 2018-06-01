<div class="container">
<?= form_open('customizer/update_meta','method="post"') ?>
    <?php
    $m = (object)unserialize($meta);
 
    ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
	<label class="form-control-label col-sm-3">Google site verification</label>
	<input type="text" name="gvs" placeholder="Google site verification" class="form-control col-sm-9" value="<?= isset($m->google)?$m->google:'' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Alexa verify id</label>
	<input type="text" name="avs" placeholder="Alexa verify id" class="form-control col-sm-9" value="<?= isset($m->alexa)?$m->alexa:'' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Yandex verify id</label>
	<input type="text" name="yvs" placeholder="Yandex verify id" class="form-control col-sm-9" value="<?= isset($m->yandex)?$m->yandex:'' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Baidu verification id</label>
	<input type="text" name="bvs" placeholder="Baidu verify id" class="form-control col-sm-9" value="<?= isset($m->baidu)?$m->baidu:'' ?>">
    </div>
</form>
</div>