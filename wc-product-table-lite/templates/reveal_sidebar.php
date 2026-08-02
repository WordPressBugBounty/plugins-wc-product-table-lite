<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<div
	class="wcpt-reveal-sidebar <?php echo esc_attr($html_class); ?>"
	aria-expanded="false"
>
	<?php echo !empty($label) ? wcpt_parse_2($label) : 'Show Filters'; ?>
	<span class="wcpt-active-count wcpt-active-count--reveal-sidebar wcpt-active-count--zero">0</span>
</div>
