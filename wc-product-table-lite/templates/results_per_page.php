<?php
if (!defined('ABSPATH')) {
	exit;
}

$table_id = $GLOBALS['wcpt_table_data']['id'];
$field_name_results_per_page = $table_id . '_results_per_page';

// get default results_per_page params
$default_params = wcpt_get_nav_filter('results_per_page');

// ensure drop down options
if (empty($dropdown_options)) {
	$dropdown_options = json_decode('[{"results":"10","label":"10 per page"},{"results":"20","label":"20 per page"}]', true);
}

// current max posts_per_page limit
if (!empty($_GET[$field_name_results_per_page])) {
	$limit = $_GET[$field_name_results_per_page];

} else {
	if ($default_params) {
		$limit = $default_params['results'];
	} else {
		if (empty($GLOBALS['wcpt_table_data']['query']['limit'])) {
			$limit = 10;
		} else {
			$limit = $GLOBALS['wcpt_table_data']['query']['limit'];
		}
	}

}

// results-per-page is always an integer count (with -1 meaning "show all"). Cast
// it once here so the visitor-supplied value can never carry markup into the
// output, and so it stays type-safe everywhere it is printed downstream.
$limit = (int) $limit;

// create a new dropdown option to accomodate limit if required
$new_op_required = true;
foreach ($dropdown_options as $option) {
	if ($option['results'] == $limit) {
		$new_op_required = false;
	}
}

if ($new_op_required) {
	$new_op = array(
		'results' => $limit,
		'label' => $limit . ' per page',
	);

	if (-1 == $limit) {
		$new_op['label'] = 'Show all results';
	}

	array_unshift($dropdown_options, $new_op);
}

if (empty($display_type)) {
	$display_type = 'dropdown';
}

if ($display_type == 'dropdown') {
	$container_html_class = 'wcpt-dropdown wcpt-filter ' . $html_class;
	$heading_html_class = 'wcpt-dropdown-label';
	$options_container_html_class = 'wcpt-dropdown-menu';
	$single_option_container_html_class = 'wcpt-dropdown-option';

} else {
	$container_html_class = 'wcpt-options-row wcpt-filter ' . $html_class;
	$heading_html_class = 'wcpt-options-heading';
	$options_container_html_class = 'wcpt-options';
	$single_option_container_html_class = 'wcpt-option';

}

// heading row
if (empty($heading)) {
	$heading = '';
}

if (!$heading = wcpt_parse_2($heading)) {
	$container_html_class .= ' wcpt-no-heading wcpt-filter-open';
} else {
	// $limit is an int (cast on read), so it is safe to substitute directly.
	$heading = str_replace('[limit]', (int) $limit, $heading);
}

// filter open in sidebar
if (
	!empty($position) &&
	$position === 'left_sidebar' &&
	!empty($accordion_always_open)
) {
	$container_html_class .= ' wcpt-filter-open wcpt-open';
}

?>
<div class="<?php echo esc_attr($container_html_class); ?>" data-wcpt-filter="results_per_page"
	data-wcpt-heading_format__op_selected="only_selected">

	<?php
	ob_start();
	?>

	<!-- options menu -->
	<div class="<?php echo esc_attr($options_container_html_class); ?>">
		<?php
		$selected_label = '';
		foreach ($dropdown_options as $option_index => $option) {

			if ($limit == $option['results']) {
				$checked = ' checked="checked" ';
				$selected_label = $option['label'];

				$filter_info = array(
					'filter' => 'results_per_page',
					'results' => $option['results'],
					'label' => $option['label'],
				);
				wcpt_update_user_filters($filter_info, true);

			} else {
				$checked = '';
			}

			?>
			<div class="<?php echo esc_attr($single_option_container_html_class); ?>">
				<label class="<?php echo $checked ? "wcpt-active" : ""; ?>">
					<input type="radio" name="<?php echo esc_attr($field_name_results_per_page); ?>" <?php echo $checked; ?>
						value="<?php echo (int) $option['results']; ?>"
						class="wcpt-filter-radio"><span><?php echo esc_html($option['label']); ?></span>
				</label>
			</div>
			<?php
		}

		?>
	</div>

	<?php
	$dropdown_menu = ob_get_clean();
	?>

	<div class="wcpt-filter-heading">
		<!-- label -->
		<span class="<?php echo esc_attr($heading_html_class); ?>">
			<span>
				<?php echo $heading ? $heading : esc_html($selected_label); ?>
			</span>
		</span>
		<!-- icon -->
		<?php wcpt_icon('chevron-down'); ?>
	</div>

	<?php echo $dropdown_menu; ?>

</div>