<?=form_open(site_url('orders/create'), 'class="form-horizontal"')?>
<?php
if ($this->session->flashdata('error') != null) {
    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
}

if ($this->session->flashdata('success') != null) {
    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
}
?>
<?=validation_errors(DIV_ERR, DIV_CLOSE)?>
<input type="hidden" name="menu_id" value="<?= $id ?>">
<input type="hidden" name="cost" value="<?= $cost ?>">
<div class="form-group">
    <div class="col-sm-12">
        <input class="form-control1" placeholder="Quantity" type="number" name="quantity" value="<?=(!empty($quantity) ? $quantity : 1)?>" required>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <textarea name="address" id="txtarea1" cols="50" rows="4" class="form-control1" placeholder="Address" style="height: 60px;" required><?=(!empty($address) ? $address : set_value('address'))?></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <input class="form-control1" placeholder="Time" type="time" name="time" value="<?=(!empty($time) ? $time : set_value('time'))?>" required>
    </div>
    <div class="col-sm-12 jlkdfj1">
        <p class="help-block">Time Format HH:MIN AM/PM e.g 12:00PM</p>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <div class="checkbox-inline1"><label><input type="checkbox" name="available" <?=(!empty($available) && $available == 1 ? 'checked' : '')?>" onchange="toggle(this)"> Always order this dish for me automatically after today</label></div>
    </div>
    <div class="col-sm-12" id="hb">
        <p class="help-block alert alert-info">Schedule orders and we would deliver your food to any address at the expected time. check the 'always order' box and select the days you want the delivery.</p>
    </div>
</div>
<div class="form-group" id="days" style="display:none;">
    <div class="col-sm-12">
    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[monday]" id="monday" <?= isset($days['monday']) && $days['monday'] == 1 ? 'checked' : set_value('days[monday]'); ?> /> 
            Monday
        </label>
    </div>

    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[tuesday]" id="tuesday" <?= isset($days['tuesday']) && $days['tuesday'] == 1 ? 'checked' : set_value('days[tuesday]'); ?> /> 
            Tuesday
        </label>
    </div>

    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[wednesday]" id="wednesday"
           <?= isset($days['wednesday']) && $days['wednesday'] == 1 ? 'checked' : set_value('days[wednesday]'); ?> />  
            Wednesday
        </label>
    </div>

    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[thursday]" id="thursday"
           <?= isset($days['thursday']) && $days['thursday'] == 1 ? 'checked' : set_value('days[thursday]'); ?> /> 
            Thursday
        </label>
    </div>

    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[friday]" id="friday"
           <?= isset($days['friday']) && $days['friday'] == 1 ? 'checked' : set_value('days[friday]'); ?> />  
            Friday
        </label>
    </div>

    <div class="checkbox-inline1">
        <label>
            <input value="1" type="checkbox" name="days[saturday]" id="saturday"
           <?= isset($days['saturday']) && $days['saturday'] == 1 ? 'checked' : set_value('days[saturday]'); ?> /> 
            Saturday
        </label>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <input class="btn btn-md btn-primary" value="Complete Order" type="submit" >
    </div>
</div>

</form>

<script type="text/javascript">
    function toggle( event )
    {
        if ( event.checked === true )
        {
            document.getElementById('days').style.display = 'block';
            document.getElementById('hb').style.display = 'none';
        }else{
            document.getElementById('days').style.display = 'none';
            document.getElementById('hb').style.display = 'block';
        }
    }
</script>