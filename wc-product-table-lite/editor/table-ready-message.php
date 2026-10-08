<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Persist the editor “layout is ready” notice until the user dismisses it.
 *
 * @param int    $post_id     Product table post ID.
 * @param string $preset_slug Applied preset slug, or 'blank'.
 */
function wcpt_mark_table_ready_message($post_id, $preset_slug = '')
{
  $post_id = absint($post_id);
  if ($post_id < 1) {
    return;
  }

  update_post_meta($post_id, 'wcpt_table_ready__message_required', true);

  if ($preset_slug !== '') {
    update_post_meta($post_id, 'wcpt_preset_applied__slug', sanitize_text_field($preset_slug));
  }
}

/**
 * Whether the layout-ready notice should still be shown for this table.
 *
 * @param int $post_id Product table post ID.
 * @return bool
 */
function wcpt_table_ready_message_is_required($post_id)
{
  $post_id = absint($post_id);
  if ($post_id < 1) {
    return false;
  }

  if (get_post_meta($post_id, 'wcpt_table_ready__message_required', true)) {
    return true;
  }

  // Backward compatibility with the old preset-only flag.
  return (bool) get_post_meta($post_id, 'wcpt_preset_applied__message_required', true);
}

/**
 * Render the layout-ready notice when it has not been dismissed.
 *
 * @param int|false $post_id Product table post ID.
 * @return bool True when the notice was printed.
 */
function wcpt_maybe_display_table_ready_message($post_id = false)
{
  if (!$post_id) {
    if (empty($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
      return false;
    }
    $post_id = absint($_GET['post_id']);
  } else {
    $post_id = absint($post_id);
  }

  if ($post_id < 1) {
    return false;
  }

  $post = get_post($post_id);
  if (!$post || $post->post_type !== 'wc_product_table') {
    return false;
  }

  if (!wcpt_table_ready_message_is_required($post_id)) {
    return false;
  }

  $preset_slug = (string) get_post_meta($post_id, 'wcpt_preset_applied__slug', true);
  $is_blank = ($preset_slug === '' || $preset_slug === 'blank');
  $preset_name = $is_blank ? '' : ucfirst(str_replace('-', ' ', $preset_slug));
  $layout_type = (strpos($preset_slug, 'list') !== false) ? 'list' : 'table';

  $edit_doc_url = 'https://wcproducttable.com/documentation/how-to-edit-a-woocommerce-product-table';
  $edit_doc_sections = array(
    'how-do-i-change-the-table-styling' => __('Change the table styling', 'wc-product-table'),
    'how-do-i-change-the-table-columns-and-product-information' => __('Change table columns and information', 'wc-product-table'),
    'how-do-i-change-which-products-the-table-shows' => __('Change which products the table shows', 'wc-product-table'),
    'how-do-i-change-the-text-in-the-table' => __('Change the text in the table', 'wc-product-table'),
    'how-do-i-change-the-navigation-filters' => __('Change the navigation filters', 'wc-product-table'),
  );

  ob_start();
  ?>
  <div class="wcpt-table-ready-message" data-post-id="<?php echo esc_attr((string) $post_id); ?>">
    <button type="button" class="wcpt-table-ready-message__dismiss"
      aria-label="<?php esc_attr_e('Dismiss', 'wc-product-table'); ?>"><?php wcpt_icon('x'); ?></button>
    <h2 class="wcpt-table-ready-message__heading">
      <?php
      echo esc_html(
        sprintf(
          /* translators: %s: "table" or "list" */
          __('☑️ Your new product %s layout is ready', 'wc-product-table'),
          $layout_type
        )
      );
      ?>
    </h2>
    <ul class="wcpt-table-ready-message__list">
      <?php if (!$is_blank): ?>
        <li>
          <?php
          echo wp_kses(
            sprintf(
              /* translators: %s: preset name, wrapped in <strong> */
              __('You selected the \'%s\' preset to create this layout.', 'wc-product-table'),
              '<strong>' . esc_html($preset_name) . '</strong>'
            ),
            array('strong' => array())
          );
          ?>
        </li>
      <?php endif; ?>
      <li>
        <?php esc_html_e('You can', 'wc-product-table'); ?>
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" target="_blank" rel="noopener noreferrer">
          <?php
          echo esc_html(
            sprintf(
              /* translators: %s: "table" or "list" */
              __('preview your new product %s', 'wc-product-table'),
              $layout_type
            )
          );
          ?>
          <?php wcpt_icon('external-link', 'wcpt-table-ready-message__external-icon'); ?>
        </a>
        <?php esc_html_e('(private link for admin)', 'wc-product-table'); ?>
      </li>
      <?php if (stripos($preset_slug, 'child-row') !== false || stripos($preset_name, 'child row') !== false): ?>
        <li>
          <?php esc_html_e('See the', 'wc-product-table'); ?>
          <a href="https://wcproducttable.com/documentation/child-row-facility" target="_blank"
            rel="noopener noreferrer"><?php esc_html_e('child row documentation', 'wc-product-table'); ?><?php wcpt_icon('external-link', 'wcpt-table-ready-message__external-icon'); ?></a>
          <?php esc_html_e('to know more about the feature.', 'wc-product-table'); ?>
        </li>
      <?php endif; ?>
      <li class="wcpt-table-ready-message__edit-guide">
        <?php esc_html_e('Help doc:', 'wc-product-table'); ?>
        <a href="<?php echo esc_url($edit_doc_url); ?>" target="_blank" rel="noopener noreferrer">
          <?php esc_html_e('How to edit a product table?', 'wc-product-table'); ?>
          <?php wcpt_icon('external-link', 'wcpt-table-ready-message__external-icon'); ?>
        </a>
        <button type="button" class="wcpt-table-ready-message__subtopics-toggle" aria-expanded="false"
          data-show-label="<?php echo esc_attr__('(+ show sub topics)', 'wc-product-table'); ?>"
          data-hide-label="<?php echo esc_attr__('(- hide sub topics)', 'wc-product-table'); ?>">
          <?php esc_html_e('(+ show sub topics)', 'wc-product-table'); ?>
        </button>
        <ul class="wcpt-table-ready-message__subtopics">
          <?php foreach ($edit_doc_sections as $section_id => $section_label): ?>
            <li>
              <a href="<?php echo esc_url($edit_doc_url . '#' . $section_id); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html($section_label); ?>
                <?php wcpt_icon('external-link', 'wcpt-table-ready-message__external-icon'); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </li>
    </ul>
  </div>
  <?php
  echo ob_get_clean();

  return true;
}

add_action('wp_ajax_wcpt_dismiss_table_ready_message', 'wcpt_dismiss_table_ready_message');
add_action('wp_ajax_wcpt_dismiss_preset_applied_message', 'wcpt_dismiss_table_ready_message');
function wcpt_dismiss_table_ready_message()
{
  $nonce = '';
  if (!empty($_POST['nonce'])) {
    $nonce = sanitize_text_field(wp_unslash($_POST['nonce']));
  }

  $nonce_valid = wp_verify_nonce($nonce, 'wcpt_dismiss_table_ready_message')
    || wp_verify_nonce($nonce, 'wcpt_dismiss_preset_applied_message');

  if (!$nonce_valid) {
    wp_send_json_error(array('message' => 'bad_nonce'), 403);
  }

  $post_id = isset($_POST['post_id']) ? absint($_POST['post_id']) : 0;
  if (
    $post_id < 1 ||
    get_post_type($post_id) !== 'wc_product_table' ||
    !current_user_can('edit_wc_product_table', $post_id)
  ) {
    wp_send_json_error(array('message' => 'forbidden'), 403);
  }

  update_post_meta($post_id, 'wcpt_table_ready__message_required', false);
  update_post_meta($post_id, 'wcpt_preset_applied__message_required', false);

  wp_send_json_success();
}
