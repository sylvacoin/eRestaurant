<div class="container">
<?= form_open_multipart('customizer/update_site_content', 'method="post"') ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
	<label class="form-control-label col-sm-3">About us</label>
	<textarea name="about" placeholder="About us description" class="form-control col-sm-9"><?= isset($about)?$about:'' ?></textarea>
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Services</label>
	<textarea name="service_intro" placeholder="Services introduction" class="form-control col-sm-9"><?= isset($service_intro)?$service_intro:'' ?></textarea>
    </div>
    <?php $service = unserialize($services); ?>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 1</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[1][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[1]['icon'])?$service[1]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[1][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[1]['title'])?$service[1]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 2</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[2][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[2]['icon'])?$service[2]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[2][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[2]['title'])?$service[2]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 3</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[3][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[3]['icon'])?$service[3]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[3][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[3]['title'])?$service[2]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 4</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[4][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[4]['icon'])?$service[4]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[4][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[4]['title'])?$service[4]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 5</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[5][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[5]['icon'])?$service[5]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[5][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[5]['title'])?$service[5]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">     
	<label class="form-control-label col-sm-3">Service 6</label>
	<div class="col-sm-9">
	    <div class="form-group">
		<input type="text" name="service[6][icon]" placeholder="Service icon" class="form-control col-sm-12" value="<?= isset($service[6]['icon'])?$service[6]['icon']:'' ?>">
	    </div>
	    <div class="form-group">
		<input type="text" name="service[6][title]" placeholder="Service title" class="form-control col-sm-12" value="<?= isset($service[6]['title'])?$service[6]['title']:'' ?>">
	    </div>
	</div>
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Portfolio description</label>
	<textarea name="portfolio_desc" placeholder="Portfolio description" class="form-control col-sm-9"><?= isset($portfolio_desc)?$portfolio_desc:'' ?></textarea>
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Reach us description</label>
	<textarea name="reachus_desc" placeholder="Reach us description" class="form-control col-sm-9"><?= isset($reachus_desc)?$reachus_desc:'' ?></textarea>
    </div>
    
</form>
</div>