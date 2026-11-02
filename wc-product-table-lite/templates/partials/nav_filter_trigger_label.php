<?php
/**
 * Inner content of the filter trigger label (.wcpt-dropdown-label / .wcpt-options-heading).
 * Combobox: placeholder text. Dropdown / row: heading markup.
 *
 * Expects: $display_type, $heading, optional $combobox_placeholder
 */
if (!defined('ABSPATH')) {
	exit;
}

if (isset($display_type) && $display_type === 'combobox') {
	$placeholder = isset($combobox_placeholder) ? trim((string) $combobox_placeholder) : '';
	if ($placeholder === '') {
		$placeholder = __('Select...', 'wc-product-table');
	}
	?>
	<span class="wcpt-combobox-placeholder"><?php echo esc_html($placeholder); ?></span>
	<?php
} else {
	echo $heading;
}
