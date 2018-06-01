<div class="table-responsive">
<table class="table table-inverse table-striped table-hover">
<thead>
<tr>
  <th>#</th>
  <th>&nbsp;</th>
  <th>Dish Name</th>
  <th>Price</th>
  <th>Description</th>
  <th>Status</th>
  <th width="100px;">&nbsp;</th>
</tr>
</thead>
<tbody>
<?php if ( !empty($menus) ): $i = 1; foreach( $menus as $dish ): ?>
	<tr>
	  <th scope="row"><?= $i++ ?></th>
	  <th><img src="<?= base_url( $dish->photo ); ?>" width="35" height="35"></th>
	  <td><?= $dish->name ?></td>
	  <td><?= $dish->price ?></td>
	  <td><?= $dish->description ?></td>
	  <td><?= $dish->isActive ? 'available' : 'not available' ?></td>
	  <td>
	  	<?= anchor('menus/edit/'.$dish->id, '<i class="lnr lnr-pencil"></i>', 'class="text-success"') ?> | <?= anchor('menus/delete/'.$dish->id, '<i class="lnr lnr-trash"></i>', 'class="text-danger"') ?>
	  </td>
	</tr>
<?php endforeach; else: ?>
<tr>
  <th scope="row" colspan="6"> No dish has been added yet</th>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>