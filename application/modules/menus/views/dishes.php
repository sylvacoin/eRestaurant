
<div class="widget_middle">
<?php if ( !empty($menus) ): $i = 1; foreach( $menus as $dish ): ?>
	<div class="col-md-3 widget_middle_left">

		<div class="widget_middle_left_slider">
		<div class="main-grid1-grids" style="background: #fff url('<?= base_url( $dish->photo ); ?>') no-repeat 0px 25px; background-size: contain; min-height: 200px;">
			
		</div>

		<div class="online">
			<div class="online-top">
		
				<div class="top-on1">
					<h4><?= $dish->name ?></h4>
					<h6><?= $dish->description ?></h6>
					<span><?= NAIRA.number_format( $dish->price, 2 ) ?></span>
					<hr>
					<a href="#" class="btn btn-primary" <?= $dish->isActive ? '' : 'disabled' ?>
						onclick="showAjaxModal('<?= base_url() ?>modal/modal_create_order/<?= $dish->id ?>');" > Order Now</a>
				</div>
				<div class="clearfix"> </div>
					
			</div>
			
		</div>
		</div>
	</div>
<?php endforeach; else: ?>
<div class="alert alert-info"> No dish has been added yet </div>
<?php endif; ?>
</div>

	
