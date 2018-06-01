<div class="container">
<?= form_open('customizer/update_socials', 'method="post"') ?>
    <?php $s = (object) unserialize($socials); ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
	<label class="form-control-label col-sm-3">Facebook url</label>
	<input type="text" name="fb" placeholder="www.facebook.com/username" class="form-control col-sm-9" value="<?= isset($s->fb)? $s->fb: '' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Instagram username</label>
	<input type="text" name="ig" placeholder="username" class="form-control col-sm-9" value="<?= isset($s->ig)? $s->ig: '' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Google+ url</label>
	<input type="text" name="gp" placeholder="plus.google.com/u/username" class="form-control col-sm-9" value="<?= isset($s->gp)? $s->gp: '' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Twitter</label>
	<input type="text" name="tw" placeholder="www.twitter.com/username" class="form-control col-sm-9" value="<?= isset($s->tw)? $s->tw: '' ?>">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">LinkedIn url</label>
	<input type="text" name="li" placeholder="www.linkedin.com/username" class="form-control col-sm-9" value="<?= isset($s->li)? $s->li: '' ?>">
    </div>
</form>
</div>