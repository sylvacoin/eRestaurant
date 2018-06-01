<h2> Order History</h2>
<div class="panel-body1">
	<?php
	if ($this->session->flashdata('error') != null) {
	    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
	}

	if ($this->session->flashdata('success') != null) {
	    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
	}
	?>
	<div class="table-responsive">
		<table class="table table-inverse table-striped table-hover">
		<thead>
		<tr>
		  <th>Order Date</th>
		  <th>Customer</th>
		  <th>Dish Name</th>
		  <th>Quantity</th>
		  <th>Customer<br> Phone  No.</th>
		  <th>Address</th>
		  <th>Status</th>
		  <th>
		  	
		  </th>
		</tr>
		</thead>
		<tbody>
		<?php if (!empty($orders)): $i = 1;foreach ($orders as $order): ?>
				<tr>
				  <td><?= $order->order_date ?></td>
				  <td> <?= $order->uname ?></td>
				  <td><?= $order->name?> </td>
				  <td><?= $order->quantity ?> plate</td>
				  <td><?= $order->phone ?></td>
				  <td><?= $order->address ?></td>
				  <td><?= $order->status == 1 ? 'Not served' : 'served' ?></td>
				  <td>
				  	<?php if ( $order->status == 1 ): ?>
				  	<?= anchor('orders/manage_orders/'.$order->ohid.'/served', 'Mark as delivered', 'class="btn btn-default"'); else: ?>
				  	<?= anchor('orders/manage_orders/'.$order->ohid.'/not-served', 'Mark as not delivered', 'class="btn btn-default"'); endif; ?>
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
