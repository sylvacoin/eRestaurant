
<?= form_open('users/fund/'.$id, array('method' => 'post', 'id' => 'login-form')) ?>
<?php
if ($this->session->flashdata('error') != NULL) {
    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
}

if ($this->session->flashdata('success') != NULL) {
    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
}
?>
<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
<fieldset class="userdata">
    <p> You are about to fund <?= $name ?> </p>
    <input placeholder="Amount" type="text" name="amt" class="form-control" value="<?= isset($amt) ? $amt : set_value('amt') ?>">
    <div class="button-wrap pull-left">
	<input type="submit" name="Submit" class="btn btn-block btn-success" value="Fund">
    </div>
</fieldset>
<?= form_close() ?>
