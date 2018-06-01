<div class="w3-container w3-section">
    <div class="w3-content">
	<table class="w3-table w3-table-all w3-border">
	    <thead>
		<tr>
		    <th width="50px">&nbsp;</th>
		    <th>states</th>
		    <th>Options</th>
		</tr>
	    </thead>
	    <tbody>
		<?php
		if ( count( $states ) > 0 ):
		    foreach ( $states as $c ):
			?>
			<tr>
			    <td><input type='checkbox' name='id[<?= $c->state_id ?>]' value="1"></td>
			    <td><?= isset( $c->state ) ? $c->state : '' ?></td>
			    <td>
				<?= anchor( 'states/edit/' . $c->state_id, 'EDIT', 'class="w3-button w3-green w3-small"' ) ?>
				<?= anchor( 'states/delete/' . $c->state_id, 'DELETE', 'class="w3-button w3-red w3-small w3-button-floating"' ) ?>
			    </td>
			</tr>
		    <?php endforeach;else:?>
		    <tr>
			<td colspan="3"><p>No data exists at the moment</p></td>
		    </tr>
		<?php endif; ?>
	    </tbody>
	</table>
    </div>
</div>