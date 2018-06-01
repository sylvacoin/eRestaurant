<div class="container">
    <?= form_open('customizer/update_contact', 'method="post"') ?>
    <?php $c = (object)unserialize($contacts); ?>
	<div class="form-group">       
	    <button type="submit" class="btn btn-primary float-right">
		<i class="fa fa-save"></i>
		save
	    </button>
	    <div class="clearfix"></div>
	</div>
	<div class="line"></div>
	<div class="form-group row">       
	    <label class="form-control-label col-sm-3">Address</label>
	    <input type="text" placeholder="Address" class="form-control col-sm-9" name="addr" value="<?= isset($c->address)?$c->address:'' ?>">
	</div>
	<div class="form-group row">       
	    <label class="form-control-label col-sm-3">Mail</label>
	    <input type="text" placeholder="email Address" class="form-control col-sm-9" name="mail" value="<?= isset($c->mail)?$c->mail:'' ?>">
	</div>
	<div class="form-group row">       
	    <label class="form-control-label col-sm-3">Phone 1</label>
	    <input type="tel" placeholder="Phone Number" class="form-control col-sm-9" name="phone[]" value="<?= isset($c->phone[0])?$c->phone[0]:'' ?>">
	</div>
	<div class="form-group row">       
	    <label class="form-control-label col-sm-3">Phone 2</label>
	    <input type="tel" placeholder="Phone Number" class="form-control col-sm-9" name="phone[]" value="<?= isset($c->phone[1])?$c->phone[1]:'' ?>">
	</div>
	<div class="form-group row">       
	    <label class="form-control-label col-sm-3">Phone 3</label>
	    <input type="tel" placeholder="Phone Number" class="form-control col-sm-9" name="phone[]" value="<?= isset($c->phone[2])?$c->phone[2]:'' ?>">
	</div>
    </form>

</div>