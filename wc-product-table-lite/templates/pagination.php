<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<div class="wcpt-pagination wcpt-device-<?php echo $device; ?> <?php if ($products->max_num_pages <= 1)
			echo " wcpt-hide "; ?>">
	<?php
	$args = array(
		// 'format' => $is_archive_table ? '?paged=%#%' : '?' . $table_id . '_paged=%#%',
		// 'format' => 'page=%#%',
		'total' => $products->max_num_pages,
		'current' => max(1, $products->query_vars['paged']),

		'prev_next' => $products->max_num_pages > 3,

		'prev_text' => wcpt_get_icon('chevron-left'),
		'next_text' => wcpt_get_icon('chevron-right'),

		'type' => 'plain',
		'end_size' => 1,
		'mid_size' => 1,
		'before_page_number' => '',
		'after_page_number' => '',
		'add_args' => false,
	);

	$table_data = wcpt_get_table_data();
	if (wp_doing_ajax() || empty($table_data['query']['sc_attrs']['_archive'])) {
		$args['format'] = '?' . $table_id . '_paged=%#%';
	}

	if ($mkp = paginate_links(apply_filters('wcpt_pagination_options', $args))) {
		echo str_replace(' current', ' current wcpt-active', $mkp);
	}
	?>
</div>