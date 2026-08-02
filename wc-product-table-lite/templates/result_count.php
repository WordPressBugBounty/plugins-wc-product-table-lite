<?php
if (!defined('ABSPATH')) {
  exit;
}

if (empty($message)) {
  $message = __('Showing [first_result] - [last_result] of [total_results] results', 'wc-product-table');
}

if (empty($single_page_message)) {
  $single_page_message = __('Showing all [displayed_results] results', 'wc-product-table');
}

if (empty($single_result_message)) {
  $single_result_message = __('Showing the single result', 'wc-product-table');
}

if (empty($no_results_message)) {
  $no_results_message = __('No results found', 'wc-product-table');
}

$result_count_placeholder_search = array(
  '[displayed_results]',
  '[total_results]',
  '[first_result]',
  '[last_result]',
);

$result_count_placeholder_replace = array(
  '[wcpt_displayed_results]',
  '[wcpt_total_results]',
  '[wcpt_first_result]',
  '[wcpt_last_result]',
);

$message_template = str_replace($result_count_placeholder_search, $result_count_placeholder_replace, $message);
$single_page_message_template = str_replace($result_count_placeholder_search, $result_count_placeholder_replace, $single_page_message);
$single_result_message_template = str_replace($result_count_placeholder_search, $result_count_placeholder_replace, $single_result_message);
$no_results_message_template = str_replace($result_count_placeholder_search, $result_count_placeholder_replace, $no_results_message);

?>
<div
  class="wcpt-result-count <?php echo $html_class; ?> [result-count-html-class]"
  data-wcpt-message-template="<?php echo esc_attr($message_template); ?>"
  data-wcpt-single-page-template="<?php echo esc_attr($single_page_message_template); ?>"
  data-wcpt-single-result-template="<?php echo esc_attr($single_result_message_template); ?>"
  data-wcpt-no-results-template="<?php echo esc_attr($no_results_message_template); ?>">
  <span class="wcpt-result-message"><?php echo $message; ?></span>
  <span class="wcpt-single-page-message"><?php echo $single_page_message; ?></span>
  <span class="wcpt-single-result-message"><?php echo $single_result_message; ?></span>
  <span class="wcpt-no-results-message"><?php echo $no_results_message; ?></span>
</div>