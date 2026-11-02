<?php
/**
 * Sets $display_type and the four HTML class variables for a nav filter.
 *
 * Optional (set before include):
 * - $wcpt_nav_filter_extra_container_class
 * - $wcpt_nav_filter_force_sidebar_dropdown (default false)
 *
 * Reads from the filter element (via extract):
 * - $sidebar_display — when set, honor display_type=row in the sidebar
 */
if (!defined('ABSPATH')) {
	exit;
}

$_wcpt_nav_display = wcpt_nav_filter_get_display_classes(array(
	'display_type' => isset($display_type) ? $display_type : '',
	'position' => isset($position) ? $position : '',
	'html_class' => isset($html_class) ? $html_class : '',
	'option_columns' => isset($option_columns) ? $option_columns : '1',
	'hide_option_input' => !empty($hide_option_input),
	'heading_separate_line' => !empty($heading_separate_line),
	'open_menu_on' => isset($open_menu_on) ? $open_menu_on : 'hover',
	'extra_container_class' => isset($wcpt_nav_filter_extra_container_class) ? $wcpt_nav_filter_extra_container_class : '',
	'force_sidebar_dropdown' => !empty($wcpt_nav_filter_force_sidebar_dropdown),
	'sidebar_display' => !empty($sidebar_display),
));

$display_type = $_wcpt_nav_display['display_type'];
$container_html_class = $_wcpt_nav_display['container'];
$heading_html_class = $_wcpt_nav_display['heading'];
$options_container_html_class = $_wcpt_nav_display['options_container'];
$single_option_container_html_class = $_wcpt_nav_display['option'];

unset($_wcpt_nav_display, $wcpt_nav_filter_extra_container_class, $wcpt_nav_filter_force_sidebar_dropdown);
