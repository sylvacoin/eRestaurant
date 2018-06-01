<div class="container">
    <?= form_open(is_numeric($this->uri->segment(2)) ? 'customizer/edit_wwd/' . $this->uri->segment(2) : 'customizer/add_wwd', 'method="post"') ?>
    <div class="form-group">       
	<button type="submit" class="btn btn-primary float-right">
	    <i class="fa fa-save"></i>
	    save
	</button>
	<div class="clearfix"></div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
	<label class="form-control-label col-sm-3">icon
	    <a href="javascript:;" title="Example, fa fa-camera | glyphicon glyphicon-bookmark"><i class="fa fa-info-circle text-blue"></i></a>
	</label>
	<input type="text" placeholder="service icon" class="form-control col-sm-9" name="icon">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">title</label>
	<input type="text" placeholder="service title" class="form-control col-sm-9" name="title">
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">description</label>
	<textarea name="descr" placeholder="Service description" class="form-control col-sm-9"></textarea>
    </div>
    <div class="form-group row">       
	<label class="form-control-label col-sm-3">Extra</label>
	<input type="text" placeholder="Extra data" class="form-control col-sm-9" name="extra">
    </div>
</form>


<?php
$services = unserialize($what_we_do);
?>
<section class="tables">


    <div class="table-responsive">
	<table class="table table-striped table-condensed">
	    <thead class="bg-light text-dark">
		<tr>
		    <th>icon</th>
		    <th>Title</th>
		    <th>Description</th>
		    <th>Extra</th>
		    <th>options</th>
		</tr>
	    </thead>
	    <tbody>
		<?php if (isset($services) && count($services) > 0):
		    foreach ( $services as $k => $s ):
			?>
			<tr>

			    <th scope="row"><?= isset($s['icon']) ? $s['icon'] : '' ?></th>
			    <td><?= isset($s['title']) ? $s['title'] : '' ?></td>
			    <td><?= isset($s['description']) ? $s['description'] : '' ?></td>
			    <td><?= isset($s['extra']) ? $s['extra'] : '' ?></td>
			    <td>

				<?= anchor('customizer/delete_service/' . $k, 'Delete') ?>
			    </td>
			</tr>
		    <?php endforeach;
		else: ?>
    		<tr>
    		    <th scope="row" colspan="5"> no service added yet</th>
    		</tr>
<?php endif; ?>
	    </tbody>
	</table>
    </div>


</section>

<section id="new">
    <h4 class="page-header">11 New Icons in 4.0</h4>

    <div class="row fontawesome-icon-list">
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rub"></i> fa fa-rub</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ruble"></i> fa fa-ruble <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rouble"></i> fa fa-rouble <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pagelines"></i> fa fa-pagelines</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-stack-exchange"></i> fa fa-stack-exchange</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-right"></i> fa fa-arrow-circle-o-right</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-left"></i> fa fa-arrow-circle-o-left</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-left"></i> fa fa-caret-square-o-left</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-left"></i> fa fa-toggle-left <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dot-circle-o"></i> fa fa-dot-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-wheelchair"></i> fa fa-wheelchair</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-vimeo-square"></i> fa fa-vimeo-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-try"></i> fa fa-try</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-turkish-lira"></i> fa fa-turkish-lira <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square-o"></i> fa fa-plus-square-o</div>
    </div>

</section>

<section id="web-application">
    <h4 class="page-header">Web Application Icons</h4>

    <div class="row fontawesome-icon-list">
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-adjust"></i> fa fa-adjust</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-anchor"></i> fa fa-anchor</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-archive"></i> fa fa-archive</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows"></i> fa fa-arrows</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-h"></i> fa fa-arrows-h</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-v"></i> fa fa-arrows-v</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-asterisk"></i> fa fa-asterisk</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ban"></i> fa fa-ban</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bar-chart-o"></i> fa fa-bar-chart-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-barcode"></i> fa fa-barcode</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bars"></i> fa fa-bars</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-beer"></i> fa fa-beer</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bell"></i> fa fa-bell</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bell-o"></i> fa fa-bell-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bolt"></i> fa fa-bolt</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-book"></i> fa fa-book</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bookmark"></i> fa fa-bookmark</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bookmark-o"></i> fa fa-bookmark-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-briefcase"></i> fa fa-briefcase</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bug"></i> fa fa-bug</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-building-o"></i> fa fa-building-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bullhorn"></i> fa fa-bullhorn</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bullseye"></i> fa fa-bullseye</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-calendar"></i> fa fa-calendar</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-calendar-o"></i> fa fa-calendar-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-camera"></i> fa fa-camera</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-camera-retro"></i> fa fa-camera-retro</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-down"></i> fa fa-caret-square-o-down</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-left"></i> fa fa-caret-square-o-left</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-right"></i> fa fa-caret-square-o-right</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-up"></i> fa fa-caret-square-o-up</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-certificate"></i> fa fa-certificate</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check"></i> fa fa-check</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-circle"></i> fa fa-check-circle</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-circle-o"></i> fa fa-check-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-square"></i> fa fa-check-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-square-o"></i> fa fa-check-square-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-circle"></i> fa fa-circle</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-circle-o"></i> fa fa-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-clock-o"></i> fa fa-clock-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cloud"></i> fa fa-cloud</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cloud-download"></i> fa fa-cloud-download</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cloud-upload"></i> fa fa-cloud-upload</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-code"></i> fa fa-code</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-code-fork"></i> fa fa-code-fork</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-coffee"></i> fa fa-coffee</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cog"></i> fa fa-cog</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cogs"></i> fa fa-cogs</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-comment"></i> fa fa-comment</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-comment-o"></i> fa fa-comment-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-comments"></i> fa fa-comments</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-comments-o"></i> fa fa-comments-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-compass"></i> fa fa-compass</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-credit-card"></i> fa fa-credit-card</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-crop"></i> fa fa-crop</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-crosshairs"></i> fa fa-crosshairs</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cutlery"></i> fa fa-cutlery</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dashboard"></i> fa fa-dashboard <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-desktop"></i> fa fa-desktop</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dot-circle-o"></i> fa fa-dot-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-download"></i> fa fa-download</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-edit"></i> fa fa-edit <span class="text-muted">(alias)</span></div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ellipsis-h"></i> fa fa-ellipsis-h</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ellipsis-v"></i> fa fa-ellipsis-v</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-envelope"></i> fa fa-envelope</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-envelope-o"></i> fa fa-envelope-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eraser"></i> fa fa-eraser</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-exchange"></i> fa fa-exchange</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-exclamation"></i> fa fa-exclamation</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-exclamation-circle"></i> fa fa-exclamation-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-exclamation-triangle"></i> fa fa-exclamation-triangle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-external-link"></i> fa fa-external-link</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-external-link-square"></i> fa fa-external-link-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eye"></i> fa fa-eye</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eye-slash"></i> fa fa-eye-slash</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-female"></i> fa fa-female</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-fighter-jet"></i> fa fa-fighter-jet</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-film"></i> fa fa-film</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-filter"></i> fa fa-filter</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-fire"></i> fa fa-fire</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-fire-extinguisher"></i> fa fa-fire-extinguisher</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flag"></i> fa fa-flag</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flag-checkered"></i> fa fa-flag-checkered</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flag-o"></i> fa fa-flag-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flash"></i> fa fa-flash <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flask"></i> fa fa-flask</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-folder"></i> fa fa-folder</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-folder-o"></i> fa fa-folder-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-folder-open"></i> fa fa-folder-open</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-folder-open-o"></i> fa fa-folder-open-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-frown-o"></i> fa fa-frown-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gamepad"></i> fa fa-gamepad</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gavel"></i> fa fa-gavel</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gear"></i> fa fa-gear <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gears"></i> fa fa-gears <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gift"></i> fa fa-gift</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-glass"></i> fa fa-glass</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-globe"></i> fa fa-globe</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-group"></i> fa fa-group <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hdd-o"></i> fa fa-hdd-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-headphones"></i> fa fa-headphones</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-heart"></i> fa fa-heart</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-heart-o"></i> fa fa-heart-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-home"></i> fa fa-home</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-inbox"></i> fa fa-inbox</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-info"></i> fa fa-info</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-info-circle"></i> fa fa-info-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-key"></i> fa fa-key</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-keyboard-o"></i> fa fa-keyboard-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-laptop"></i> fa fa-laptop</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-leaf"></i> fa fa-leaf</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-legal"></i> fa fa-legal <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-lemon-o"></i> fa fa-lemon-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-level-down"></i> fa fa-level-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-level-up"></i> fa fa-level-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-lightbulb-o"></i> fa fa-lightbulb-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-location-arrow"></i> fa fa-location-arrow</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-lock"></i> fa fa-lock</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-magic"></i> fa fa-magic</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-magnet"></i> fa fa-magnet</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-mail-forward"></i> fa fa-mail-forward <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-mail-reply"></i> fa fa-mail-reply <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-mail-reply-all"></i> fa fa-mail-reply-all</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-male"></i> fa fa-male</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-map-marker"></i> fa fa-map-marker</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-meh-o"></i> fa fa-meh-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-microphone"></i> fa fa-microphone</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-microphone-slash"></i> fa fa-microphone-slash</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus"></i> fa fa-minus</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus-circle"></i> fa fa-minus-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus-square"></i> fa fa-minus-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus-square-o"></i> fa fa-minus-square-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-mobile"></i> fa fa-mobile</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-mobile-phone"></i> fa fa-mobile-phone <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-money"></i> fa fa-money</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-moon-o"></i> fa fa-moon-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-music"></i> fa fa-music</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pencil"></i> fa fa-pencil</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pencil-square"></i> fa fa-pencil-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pencil-square-o"></i> fa fa-pencil-square-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-phone"></i> fa fa-phone</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-phone-square"></i> fa fa-phone-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-picture-o"></i> fa fa-picture-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plane"></i> fa fa-plane</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus"></i> fa fa-plus</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-circle"></i> fa fa-plus-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square"></i> fa fa-plus-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square-o"></i> fa fa-plus-square-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-power-off"></i> fa fa-power-off</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-print"></i> fa fa-print</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-puzzle-piece"></i> fa fa-puzzle-piece</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-qrcode"></i> fa fa-qrcode</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-question"></i> fa fa-question</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-question-circle"></i> fa fa-question-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-quote-left"></i> fa fa-quote-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-quote-right"></i> fa fa-quote-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-random"></i> fa fa-random</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-refresh"></i> fa fa-refresh</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-reply"></i> fa fa-reply</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-reply-all"></i> fa fa-reply-all</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-retweet"></i> fa fa-retweet</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-road"></i> fa fa-road</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rocket"></i> fa fa-rocket</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rss"></i> fa fa-rss</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rss-square"></i> fa fa-rss-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-search"></i> fa fa-search</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-search-minus"></i> fa fa-search-minus</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-search-plus"></i> fa fa-search-plus</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-share"></i> fa fa-share</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-share-square"></i> fa fa-share-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-share-square-o"></i> fa fa-share-square-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-shield"></i> fa fa-shield</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-shopping-cart"></i> fa fa-shopping-cart</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sign-in"></i> fa fa-sign-in</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sign-out"></i> fa fa-sign-out</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-signal"></i> fa fa-signal</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sitemap"></i> fa fa-sitemap</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-smile-o"></i> fa fa-smile-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort"></i> fa fa-sort</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-alpha-asc"></i> fa fa-sort-alpha-asc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-alpha-desc"></i> fa fa-sort-alpha-desc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-amount-asc"></i> fa fa-sort-amount-asc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-amount-desc"></i> fa fa-sort-amount-desc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-asc"></i> fa fa-sort-asc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-desc"></i> fa fa-sort-desc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-down"></i> fa fa-sort-down <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-numeric-asc"></i> fa fa-sort-numeric-asc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-numeric-desc"></i> fa fa-sort-numeric-desc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sort-up"></i> fa fa-sort-up <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-spinner"></i> fa fa-spinner</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-square"></i> fa fa-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-square-o"></i> fa fa-square-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star"></i> fa fa-star</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star-half"></i> fa fa-star-half</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star-half-empty"></i> fa fa-star-half-empty <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star-half-full"></i> fa fa-star-half-full <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star-half-o"></i> fa fa-star-half-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-star-o"></i> fa fa-star-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-subscript"></i> fa fa-subscript</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-suitcase"></i> fa fa-suitcase</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-sun-o"></i> fa fa-sun-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-superscript"></i> fa fa-superscript</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tablet"></i> fa fa-tablet</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tachometer"></i> fa fa-tachometer</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tag"></i> fa fa-tag</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tags"></i> fa fa-tags</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tasks"></i> fa fa-tasks</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-terminal"></i> fa fa-terminal</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-thumb-tack"></i> fa fa-thumb-tack</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-thumbs-down"></i> fa fa-thumbs-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-thumbs-o-down"></i> fa fa-thumbs-o-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-thumbs-o-up"></i> fa fa-thumbs-o-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-thumbs-up"></i> fa fa-thumbs-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ticket"></i> fa fa-ticket</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-times"></i> fa fa-times</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-times-circle"></i> fa fa-times-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-times-circle-o"></i> fa fa-times-circle-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tint"></i> fa fa-tint</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-down"></i> fa fa-toggle-down <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-left"></i> fa fa-toggle-left <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-right"></i> fa fa-toggle-right <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-up"></i> fa fa-toggle-up <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-trash-o"></i> fa fa-trash-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-trophy"></i> fa fa-trophy</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-truck"></i> fa fa-truck</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-umbrella"></i> fa fa-umbrella</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-unlock"></i> fa fa-unlock</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-unlock-alt"></i> fa fa-unlock-alt</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-unsorted"></i> fa fa-unsorted <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-upload"></i> fa fa-upload</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-user"></i> fa fa-user</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-users"></i> fa fa-users</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-video-camera"></i> fa fa-video-camera</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-volume-down"></i> fa fa-volume-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-volume-off"></i> fa fa-volume-off</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-volume-up"></i> fa fa-volume-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-warning"></i> fa fa-warning <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-wheelchair"></i> fa fa-wheelchair</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-wrench"></i> fa fa-wrench</div>
    </div>
</section>

<section id="form-control">
    <h4 class="page-header">Form Control Icons</h4>
    <div class="row fontawesome-icon-list">
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-square"></i> fa fa-check-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-check-square-o"></i> fa fa-check-square-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-circle"></i> fa fa-circle</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-circle-o"></i> fa fa-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dot-circle-o"></i> fa fa-dot-circle-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus-square"></i> fa fa-minus-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-minus-square-o"></i> fa fa-minus-square-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square"></i> fa fa-plus-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square-o"></i> fa fa-plus-square-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-square"></i> fa fa-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-square-o"></i> fa fa-square-o</div>
    </div>
</section>

<section id="currency">
    <h4 class="page-header">Currency Icons</h4>

    <div class="row fontawesome-icon-list">

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bitcoin"></i> fa fa-bitcoin <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-btc"></i> fa fa-btc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cny"></i> fa fa-cny <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dollar"></i> fa fa-dollar <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eur"></i> fa fa-eur</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-euro"></i> fa fa-euro <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gbp"></i> fa fa-gbp</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-inr"></i> fa fa-inr</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-jpy"></i> fa fa-jpy</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-krw"></i> fa fa-krw</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-money"></i> fa fa-money</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rmb"></i> fa fa-rmb <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rouble"></i> fa fa-rouble <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rub"></i> fa fa-rub</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ruble"></i> fa fa-ruble <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rupee"></i> fa fa-rupee <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-try"></i> fa fa-try</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-turkish-lira"></i> fa fa-turkish-lira <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-usd"></i> fa fa-usd</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-won"></i> fa fa-won <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-yen"></i> fa fa-yen <span class="text-muted">(alias)</span></div>

    </div>

</section>

<section id="text-editor">
    <h4 class="page-header">Text Editor Icons</h4>

    <div class="row fontawesome-icon-list">



	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-align-center"></i> fa fa-align-center</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-align-justify"></i> fa fa-align-justify</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-align-left"></i> fa fa-align-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-align-right"></i> fa fa-align-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bold"></i> fa fa-bold</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chain"></i> fa fa-chain <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chain-broken"></i> fa fa-chain-broken</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-clipboard"></i> fa fa-clipboard</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-columns"></i> fa fa-columns</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-copy"></i> fa fa-copy <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-cut"></i> fa fa-cut <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dedent"></i> fa fa-dedent <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eraser"></i> fa fa-eraser</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-file"></i> fa fa-file</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-file-o"></i> fa fa-file-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-file-text"></i> fa fa-file-text</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-file-text-o"></i> fa fa-file-text-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-files-o"></i> fa fa-files-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-floppy-o"></i> fa fa-floppy-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-font"></i> fa fa-font</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-indent"></i> fa fa-indent</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-italic"></i> fa fa-italic</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-link"></i> fa fa-link</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-list"></i> fa fa-list</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-list-alt"></i> fa fa-list-alt</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-list-ol"></i> fa fa-list-ol</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-list-ul"></i> fa fa-list-ul</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-outdent"></i> fa fa-outdent</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-paperclip"></i> fa fa-paperclip</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-paste"></i> fa fa-paste <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-repeat"></i> fa fa-repeat</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rotate-left"></i> fa fa-rotate-left <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-rotate-right"></i> fa fa-rotate-right <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-save"></i> fa fa-save <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-scissors"></i> fa fa-scissors</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-strikethrough"></i> fa fa-strikethrough</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-table"></i> fa fa-table</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-text-height"></i> fa fa-text-height</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-text-width"></i> fa fa-text-width</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-th"></i> fa fa-th</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-th-large"></i> fa fa-th-large</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-th-list"></i> fa fa-th-list</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-underline"></i> fa fa-underline</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-undo"></i> fa fa-undo</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-unlink"></i> fa fa-unlink <span class="text-muted">(alias)</span></div>

    </div>

</section>

<section id="directional">
    <h4 class="page-header">Directional Icons</h4>

    <div class="row fontawesome-icon-list">



	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-double-down"></i> fa fa-angle-double-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-double-left"></i> fa fa-angle-double-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-double-right"></i> fa fa-angle-double-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-double-up"></i> fa fa-angle-double-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-down"></i> fa fa-angle-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-left"></i> fa fa-angle-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-right"></i> fa fa-angle-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-angle-up"></i> fa fa-angle-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-down"></i> fa fa-arrow-circle-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-left"></i> fa fa-arrow-circle-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-down"></i> fa fa-arrow-circle-o-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-left"></i> fa fa-arrow-circle-o-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-right"></i> fa fa-arrow-circle-o-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-o-up"></i> fa fa-arrow-circle-o-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-right"></i> fa fa-arrow-circle-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-circle-up"></i> fa fa-arrow-circle-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-down"></i> fa fa-arrow-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-left"></i> fa fa-arrow-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-right"></i> fa fa-arrow-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrow-up"></i> fa fa-arrow-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows"></i> fa fa-arrows</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-alt"></i> fa fa-arrows-alt</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-h"></i> fa fa-arrows-h</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-v"></i> fa fa-arrows-v</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-down"></i> fa fa-caret-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-left"></i> fa fa-caret-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-right"></i> fa fa-caret-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-down"></i> fa fa-caret-square-o-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-left"></i> fa fa-caret-square-o-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-right"></i> fa fa-caret-square-o-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-square-o-up"></i> fa fa-caret-square-o-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-caret-up"></i> fa fa-caret-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-circle-down"></i> fa fa-chevron-circle-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-circle-left"></i> fa fa-chevron-circle-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-circle-right"></i> fa fa-chevron-circle-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-circle-up"></i> fa fa-chevron-circle-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-down"></i> fa fa-chevron-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-left"></i> fa fa-chevron-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-right"></i> fa fa-chevron-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-chevron-up"></i> fa fa-chevron-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hand-o-down"></i> fa fa-hand-o-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hand-o-left"></i> fa fa-hand-o-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hand-o-right"></i> fa fa-hand-o-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hand-o-up"></i> fa fa-hand-o-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-long-arrow-down"></i> fa fa-long-arrow-down</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-long-arrow-left"></i> fa fa-long-arrow-left</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-long-arrow-right"></i> fa fa-long-arrow-right</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-long-arrow-up"></i> fa fa-long-arrow-up</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-down"></i> fa fa-toggle-down <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-left"></i> fa fa-toggle-left <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-right"></i> fa fa-toggle-right <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-toggle-up"></i> fa fa-toggle-up <span class="text-muted">(alias)</span></div>

    </div>

</section>

<section id="video-player">
    <h4 class="page-header">Video Player Icons</h4>

    <div class="row fontawesome-icon-list">



	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-arrows-alt"></i> fa fa-arrows-alt</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-backward"></i> fa fa-backward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-compress"></i> fa fa-compress</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-eject"></i> fa fa-eject</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-expand"></i> fa fa-expand</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-fast-backward"></i> fa fa-fast-backward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-fast-forward"></i> fa fa-fast-forward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-forward"></i> fa fa-forward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pause"></i> fa fa-pause</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-play"></i> fa fa-play</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-play-circle"></i> fa fa-play-circle</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-play-circle-o"></i> fa fa-play-circle-o</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-step-backward"></i> fa fa-step-backward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-step-forward"></i> fa fa-step-forward</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-stop"></i> fa fa-stop</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-youtube-play"></i> fa fa-youtube-play</div>

    </div>

</section>

<section id="brand">
    <h4 class="page-header">Brand Icons</h4>

    <div class="alert alert-info">
	<ul class="margin-bottom-none padding-left-lg">
	    <li>All brand icons are trademarks of their respective owners.</li>
	    <li>The use of these trademarks does not indicate endorsement of the trademark holder by Font Awesome, nor vice versa.</li>
	</ul>

    </div>

    <div class="row fontawesome-icon-list">



	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-adn"></i> fa fa-adn</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-android"></i> fa fa-android</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-apple"></i> fa fa-apple</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bitbucket"></i> fa fa-bitbucket</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bitbucket-square"></i> fa fa-bitbucket-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-bitcoin"></i> fa fa-bitcoin <span class="text-muted">(alias)</span></div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-btc"></i> fa fa-btc</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-css3"></i> fa fa-css3</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dribbble"></i> fa fa-dribbble</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-dropbox"></i> fa fa-dropbox</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-facebook"></i> fa fa-facebook</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-facebook-square"></i> fa fa-facebook-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-flickr"></i> fa fa-flickr</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-foursquare"></i> fa fa-foursquare</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-github"></i> fa fa-github</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-github-alt"></i> fa fa-github-alt</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-github-square"></i> fa fa-github-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-gittip"></i> fa fa-gittip</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-google-plus"></i> fa fa-google-plus</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-google-plus-square"></i> fa fa-google-plus-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-html5"></i> fa fa-html5</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-instagram"></i> fa fa-instagram</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-linkedin"></i> fa fa-linkedin</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-linkedin-square"></i> fa fa-linkedin-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-linux"></i> fa fa-linux</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-maxcdn"></i> fa fa-maxcdn</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pagelines"></i> fa fa-pagelines</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pinterest"></i> fa fa-pinterest</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-pinterest-square"></i> fa fa-pinterest-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-renren"></i> fa fa-renren</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-skype"></i> fa fa-skype</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-stack-exchange"></i> fa fa-stack-exchange</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-stack-overflow"></i> fa fa-stack-overflow</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-trello"></i> fa fa-trello</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tumblr"></i> fa fa-tumblr</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-tumblr-square"></i> fa fa-tumblr-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-twitter"></i> fa fa-twitter</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-twitter-square"></i> fa fa-twitter-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-vimeo-square"></i> fa fa-vimeo-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-vk"></i> fa fa-vk</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-weibo"></i> fa fa-weibo</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-windows"></i> fa fa-windows</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-xing"></i> fa fa-xing</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-xing-square"></i> fa fa-xing-square</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-youtube"></i> fa fa-youtube</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-youtube-play"></i> fa fa-youtube-play</div>

	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-youtube-square"></i> fa fa-youtube-square</div>

    </div>
</section>

<section id="medical">
    <h4 class="page-header">Medical Icons</h4>
    <div class="row">
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-ambulance"></i> fa fa-ambulance</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-h-square"></i> fa fa-h-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-hospital-o"></i> fa fa-hospital-o</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-medkit"></i> fa fa-medkit</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-plus-square"></i> fa fa-plus-square</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-stethoscope"></i> fa fa-stethoscope</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-user-md"></i> fa fa-user-md</div>
	<div class="col-md-3 col-sm-4"><i class="fa fa-fw fa fa-wheelchair"></i> fa fa-wheelchair</div>
    </div>
</section>
</div>