<h2> Scheduled Orders </h2>
<div class="panel-body1">
	<div class="table-responsive">
		<table class="table table-inverse table-striped table-hover">
		<thead>
		<tr>
		  <th>#</th>
		  <th>&nbsp;</th>
		  <th>Dish Name</th>
		  <th>Price</th>
		  <th>Quantity</th>
		  <th>Address</th>
		  <th>Created on</th>
		  <th width="100px;">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php if (!empty($orders)): $i = 1;foreach ($orders as $order): ?>
				<tr>
				  <th scope="row"><?=$i++?></th>
				  <th><img src="<?=base_url($order->photo);?>" width="35" height="35"></th>
				  <td><?=$order->name?> </td>
				  <td><?=$order->price ?></td>
				  <td><?=$order->quantity ?> plate</td>
				  <td><?=$order->address ?></td>
				  <td> <?= date( 'jS F Y',$order->created_date) ?></td>
				  <td>
				  	<a href="#" class="text-success" onclick="showAjaxModal('<?= base_url() ?>modal/modal_view_order_schedules/<?= $order->oid ?>');" ><i class="lnr lnr-layers"></i></a> | 
				  <?= anchor('orders/edit/' . $order->oid, '<i class="lnr lnr-pencil"></i>', 'class="text-success"')?> | 
				  <?= anchor('orders/delete/' . $order->oid, '<i class="lnr lnr-trash"></i>', 'class="text-danger"')?>
				  </td>
				</tr>
			<?php endforeach;else: ?>
		<tr>
		  <th scope="row" colspan="6"> No dish has been added yet</th>
		</tr>
		<?php endif;?>
		</tbody>
		</table>
	</div>
</div>
<div class="alert alert-info">
	<p><i class="lnr lnr-warning"></i> Shows all the orders that have been scheduled to be delivered click on <i class="lnr lnr-layers"></i> to see scheduled date and time</p>
</div>