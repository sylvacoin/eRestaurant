
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
	<thead>
	<tr>
	  
	  <th>Days of delivery</th>
	  <th>Times of delivery</th>
	  <th>Address</th>
	</tr>
	</thead>
	<tbody>
	<?php if (!empty($days)): $i = 1;foreach ($days as $d): ?>
			<tr>
			  <td><?=$d->day ?></td>
			  <td><?= date('h:i A', strtotime($d->time)) ?></td>
			  <td><?=$d->address ?></td>
			</tr>
		<?php endforeach;else: ?>
	<tr>
	  <th scope="row" colspan="6"> No Delivery schedules for this</th>
	</tr>
	<?php endif;?>
	</tbody>
	</table>
</div>

