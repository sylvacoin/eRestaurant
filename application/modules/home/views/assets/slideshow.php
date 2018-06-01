<?php if (isset($slides) && count($slides['img']) > 0): ?>

    <div id="owl-demo" class="owl-carousel owl-inner-nav owl-ui-sm">

	<?php $i = 0;
	foreach ( $slides['img'] as $slide ):
	    ?>
	    <div class="item" style="background-image: url(<?php echo base_url($slide) ?>);">
		<div class="w3-container">
		    <div class="caption bg-color vertical-center text-left">
			<div class="slider-header fadeInDown-1">
	<?= isset($slides['text'][$i]) ? $slides['text'][$i] : '' ?>
			</div>
			<div class="big-text fadeInDown-1">
	<?= isset($slides['text'][$i]) ? $slides['text'][$i] : '' ?>
			</div>

			<div class="excerpt fadeInDown-2 hidden-xs">

			    <span>
	<?= isset($slides['subtext'][$i]) ? $slides['subtext'][$i] : '' ?>
			    </span>

			</div>
	<?php if (isset($slides['url'][$i]) && $slides['url'][$i] != NULL): ?>
	    		<div class="button-holder fadeInDown-3">
	    		    <a href="<?php echo $slides['url'][$i] ?>" class="w3-large w3-btn btn-uppercase <?php echo $slides['btncolor'][$i] ?> shop-now-button"><?php echo $slides['urltext'][$i] ?></a>
	    		</div>
	<?php endif; ?>
		    </div><!-- /.caption -->
		</div><!-- /.container-fluid -->
	    </div><!-- /.item -->
	    <?php $i++;
	endforeach;
	?>

    </div><!-- /.owl-carousel -->

<?php endif; ?>
<div class="info-boxes wow fadeInUp animated" ystyle="visibility: visible; animation-name: fadeInUp;">
    <div class="info-boxes-inner">
	<div class="w3-row">
	    <div class="w3-col m6 l4">
		<div class="info-box">
		    <div class="w3-row">

			<div class="w3-col s12">
			    <h4 class="info-box-heading green">money back</h4>
			</div>
		    </div>	
		    <h6 class="text">30 Days Money Back Guarantee</h6>
		</div>
	    </div><!-- .col -->

	    <div class="w3-col m6 l4 w3-hide-medium">
		<div class="info-box">
		    <div class="w3-row">

			<div class="w3-col s12">
			    <h4 class="info-box-heading green">free shipping</h4>
			</div>
		    </div>
		    <h6 class="text">Shipping on orders over ₦99</h6>	
		</div>
	    </div><!-- .col -->

	    <div class="w3-col m6 l4">
		<div class="info-box">
		    <div class="w3-row">

			<div class="w3-col s12">
			    <h4 class="info-box-heading green">Special Sale</h4>
			</div>
		    </div>
		    <h6 class="text">Extra ₦5 off on all items </h6>	
		</div>
	    </div><!-- .col -->
	</div><!-- /.row -->
    </div>
</div>