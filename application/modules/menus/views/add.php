<?php $id = $this->uri->segment(3);; ?>
<?=form_open_multipart( site_url( (is_numeric( $id ) ? 'menus/edit/'.$id: 'menus/create') ), 'class="form-horizontal"')?>
<?php
if ($this->session->flashdata('error') != null) {
    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
}

if ($this->session->flashdata('success') != null) {
    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
}
?>
<?=validation_errors(DIV_ERR, DIV_CLOSE)?>
<div class="form-group">
    <div class="col-sm-12">
        <input class="form-control1" placeholder="Dish Name" type="text" name="name" value="<?= (!empty($name) ? $name : set_value('name')) ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <input class="form-control1" placeholder="Price (0.00)" type="number" name="price" value="<?= (!empty($price) ? $price : set_value('price')) ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <textarea name="description" id="txtarea1" cols="50" rows="4" class="form-control1" placeholder="Description" style="height: 100px;"><?= (!empty($description) ? $description : set_value('description')) ?></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 160px;">
            <img src="<?=base_url() . (!empty($preview) ? $preview : '')?>" alt="...">
        </div>
        <div>
            <span class="btn btn-primary btn-file btn-xs">
                <span class="fileinput-new">Upload Preview</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="image" />
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <div class="checkbox-inline1"><label><input type="checkbox" name="available" <?= (!empty($available) && $available == 1 ? 'checked' : '' ) ?>"> Dish is Available</label></div>
    </div>
    <div class="col-sm-12 jlkdfj1">
        <p class="help-block">Check of dish is available for purchase!</p>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <input class="btn btn-md btn-primary" value="Save" type="submit" >
    </div>
</div>

</form>