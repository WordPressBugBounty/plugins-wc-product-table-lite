<?php
/**
 * Clear (×) control for combobox triggers — placed before the chevron.
 * Visible only when the combobox has a selection.
 *
 * Expects: $display_type
 */
if (!defined('ABSPATH')) {
	exit;
}

if (!isset($display_type) || $display_type !== 'combobox') {
	return;
}

wcpt_icon('x', 'wcpt-combobox-clear', null, '', __('Clear', 'wc-product-table'));
