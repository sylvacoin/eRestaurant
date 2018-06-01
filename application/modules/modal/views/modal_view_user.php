
<?= form_open('', array('method' => 'post', 'id' => 'login-form')) ?>
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
    <ul class="ul-list">
	<li class=""> <b>Name: </b> <?= $name ?> </li>
	<li class=""> <b>Email: </b> <?= $email ?> </li>
	<li class=""> <b>Phone: </b> <?= $phone ?> </li>
	<li class=""> <b>is Activated: </b> <?= $token == 1 ? 'Activated':'pending' ?> </li>
	<li class=""> <b>Total units: </b> <?= $units ?> </li>
	<li class=""> <b>last seen: </b> <?= date('jS F Y', $last_seen) ?> </li>
	<li class=""> <b>registration date </b> <?= date('jS F Y', $regdate) ?> </li>
    </ul>
</fieldset>
<?= form_close() ?>

<div class="btn-group float-right">
    <a  onclick="showAjaxModal('<?= base_url() ?>modal/modal_view_sms/<?= $user_id ?>');" class="btn btn-default">View SMS History</a>
    <a onclick="showAjaxModal('<?= base_url() ?>modal/modal_view_transactions/<?= $user_id ?>');" class="btn btn-default">View Transaction History</a>
</div>
