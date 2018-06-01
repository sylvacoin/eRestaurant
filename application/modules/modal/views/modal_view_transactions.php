
<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed table-bordered modal-table">
	<thead>
	    <tr>
		<th>#</th>
		<th>Transaction ID</th>
		<th>Transaction date</th>
		<th>Type</th>
		<th>Amount</th>
		<th>Total + VAT</th>
		<th>Status</th>
	    </tr>
	</thead>
	<tbody>
	    <?php
	    if (isset($transactions) && count($transactions) > 0): $i = 1;
		foreach ( $transactions as $c ):
		    ?>
		    <tr>
			<td><?= $i++ ?></td>
			<td><?= isset($c->guid) ? $c->guid : '' ?></td>
			<td><?= isset($c->trans_date) ? date('jS F Y', $c->trans_date) : '' ?></td>
			<td><?= isset($c->guid) && strpos($c->guid, 'bank-') !== false ? 'Bank' : 'Paystack'; ?></td>
			<td><?= isset($c->amt) ? N . number_format($c->amt, 2) : N . number_format(0, 2) ?></td>
			<td><?= isset($c->total) ? N . number_format($c->total, 2) : N . number_format(0, 2) ?></td>
			<td><?= isset($c->is_complete) && $c->is_complete == 1 ? 'successful' : 'Failed' ?></td>
		    </tr>
		<?php endforeach;
	    else:
		?>
    	    <tr>
    		<td colspan="5"> no message history </td>
    	    </tr>
<?php endif; ?>
	</tbody>
    </table>
</div>
