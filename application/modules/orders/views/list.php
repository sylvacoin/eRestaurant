<h2> Order History</h2>
<div class="panel-body1">
	<div class="table-responsive">
		<table class="table table-inverse table-striped table-hover">
		<thead>
		<tr>
		  <th>#</th>
		  <th>&nbsp;</th>
		  <th>Order Date</th>
		  <th>Dish Name</th>
		  <th>Cost</th>
		  <th>Quantity</th>
		  <th>Address</th>
		  
		</tr>
		</thead>
		<tbody>
		<?php if (!empty($orders)): $i = 1;foreach ($orders as $order): ?>
				<tr>
				  <th scope="row"><?=$i++?></th>
				  <th><img src="<?=base_url($order->photo);?>" width="35" height="35"></th>
				  <td> <?= date( 'jS F Y',$order->created_date) ?></td>
				  <td><?=$order->name?> </td>
				  <td><?= NAIRA.number_format($order->price,2) ?></td>
				  <td><?=$order->quantity ?> plate</td>
				  <td><?=$order->address ?></td>
				  
				  
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
