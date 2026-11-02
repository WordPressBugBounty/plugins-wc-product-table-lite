<?php
/**
 * External label above the combobox trigger.
 * Expects $display_type and $heading (already parsed HTML string or block markup).
 */
if (!defined('ABSPATH')) {
	exit;
}

if (
	isset($display_type) &&
	$display_type === 'combobox' &&
	!empty($heading)
) {
	?>
	<div class="wcpt-combobox-label">
		<?php echo $heading; ?>
	</div>
	<?php
}
