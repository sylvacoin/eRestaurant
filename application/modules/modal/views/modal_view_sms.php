<div class="table-responsive">
<table class="table modal-table">
    <thead>
	<tr>
	    <th>#</th>
	    <th>Sender ID</th>
	    <th>Message</th>
	    <th>Scheduled Date</th>
	</tr>
    </thead>
    <tbody>
	<?php if (isset($sms) && count($sms) > 0): $i = 1;
	    foreach ( $sms as $s ):
		?>
		<tr>
		    <td><?= $i++ ?></td>
		    <td><?= isset($s->delivery_name) ? $s->delivery_name : '' ?></td>
		    <td><?= isset($s->message) ? $s->message : '' ?></td>
		    <td><?= isset($s->sent_date) ? date('d Fs Y', $s->sent_date) : ''; ?></td>
		</tr>
    <?php endforeach;
else: ?>
    	<tr>
    	    <td colspan="5"> no message history yeah </td>
    	</tr>
<?php endif; ?>
    </tbody>
</table>
</div>
