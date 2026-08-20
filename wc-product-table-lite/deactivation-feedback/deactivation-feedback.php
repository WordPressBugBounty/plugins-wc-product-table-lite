<?php
/**
 * Lite-only deactivation feedback modal.
 *
 * Intercepts the Plugins screen "Deactivate" link, optionally collects a
 * reason + message, posts it to the author's server, then continues deactivation.
 * Skip is always available so the flow stays non-intrusive.
 */

if (!defined('ABSPATH')) {
  exit;
}

// Pro never shows this survey.
if (defined('WCPT_PRO')) {
  return;
}

/**
 * Endpoint on your server that receives feedback submissions.
 * Point this at the collect-feedback.php script after you deploy it.
 */
if (!defined('WCPT_DEACTIVATION_FEEDBACK_URL')) {
  define('WCPT_DEACTIVATION_FEEDBACK_URL', 'https://wcproducttable.com/api/deactivation-feedback.php');
}

/**
 * Shared secret sent as X-WCPT-Token. Must match $shared_secret on the collector.
 * Override in wp-config.php for your production value.
 */
if (!defined('WCPT_DEACTIVATION_FEEDBACK_SECRET')) {
  define('WCPT_DEACTIVATION_FEEDBACK_SECRET', 'wcpt-lite-deactivation-feedback');
}

/** Max free-text length forwarded to the collector. */
if (!defined('WCPT_DEACTIVATION_FEEDBACK_MESSAGE_MAX')) {
  define('WCPT_DEACTIVATION_FEEDBACK_MESSAGE_MAX', 2000);
}

add_action('admin_enqueue_scripts', 'wcpt_deactivation_feedback_assets');
add_action('admin_footer', 'wcpt_deactivation_feedback_modal');
add_action('wp_ajax_wcpt_deactivation_feedback', 'wcpt_deactivation_feedback_ajax');

/**
 * Reason options shown in the modal.
 *
 * @return array<string, string> slug => label
 */
function wcpt_deactivation_feedback_reasons()
{
  return array(
    'temporary' => __('It\'s a temporary deactivation — I\'m just testing / troubleshooting', 'wc-product-table-pro'),
    'missing_feature' => __('I couldn\'t find a feature I need', 'wc-product-table-pro'),
    'too_complicated' => __('The plugin is too complicated / hard to use', 'wc-product-table-pro'),
    'broken' => __('The plugin is broken or caused conflicts / errors', 'wc-product-table-pro'),
    'better_plugin' => __('I found a better plugin', 'wc-product-table-pro'),
    'upgraded_pro' => __('I upgraded to the PRO version', 'wc-product-table-pro'),
    'other' => __('Other reason', 'wc-product-table-pro'),
  );
}

/**
 * Enqueue assets only on the Plugins screen.
 *
 * @param string $hook Current admin page hook.
 */
function wcpt_deactivation_feedback_assets($hook)
{
  if ($hook !== 'plugins.php') {
    return;
  }

  $base = plugin_dir_url(__FILE__);

  wp_enqueue_style(
    'wcpt-deactivation-feedback',
    $base . 'deactivation-feedback.css',
    array(),
    WCPT_VERSION
  );

  wp_enqueue_script(
    'wcpt-deactivation-feedback',
    $base . 'deactivation-feedback.js',
    array('jquery'),
    WCPT_VERSION,
    true
  );

  $plugin_file = defined('WCPT_PLUGIN_PATH')
    ? WCPT_PLUGIN_PATH . 'main.php'
    : dirname(__DIR__) . '/main.php';
  $basename = plugin_basename($plugin_file);

  wp_localize_script(
    'wcpt-deactivation-feedback',
    'wcptDeactivationFeedback',
    array(
      'ajaxUrl' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('wcpt_deactivation_feedback'),
      'pluginBasename' => $basename,
      'pluginSlug' => dirname($basename),
      'i18n' => array(
        'submitting' => __('Submitting…', 'wc-product-table-pro'),
        'submit' => __('Submit & Deactivate', 'wc-product-table-pro'),
        'skip' => __('Skip & Deactivate', 'wc-product-table-pro'),
      ),
    )
  );
}

/**
 * Print the modal markup in the admin footer on the Plugins screen.
 */
function wcpt_deactivation_feedback_modal()
{
  $screen = function_exists('get_current_screen') ? get_current_screen() : null;
  if (!$screen || $screen->id !== 'plugins') {
    return;
  }

  $reasons = wcpt_deactivation_feedback_reasons();
  ?>
  <div id="wcpt-deactivation-feedback" class="wcpt-df" hidden>
    <div class="wcpt-df__backdrop" data-wcpt-df-skip></div>
    <div class="wcpt-df__dialog" role="dialog" aria-modal="true" aria-labelledby="wcpt-df-title">
      <button type="button" class="wcpt-df__close" data-wcpt-df-skip
        aria-label="<?php esc_attr_e('Close and deactivate', 'wc-product-table-pro'); ?>">&times;</button>

      <h2 id="wcpt-df-title" class="wcpt-df__title">
        <?php esc_html_e('Quick feedback before you go?', 'wc-product-table-pro'); ?>
      </h2>
      <p class="wcpt-df__subtitle">
        <?php esc_html_e('If you have a moment, tell us why you\'re deactivating. Your feedback helps improve the plugin — skipping is always fine.', 'wc-product-table-pro'); ?>
      </p>

      <form id="wcpt-df-form" class="wcpt-df__form">
        <fieldset class="wcpt-df__reasons">
          <legend class="screen-reader-text"><?php esc_html_e('Reason for deactivating', 'wc-product-table-pro'); ?>
          </legend>
          <?php foreach ($reasons as $slug => $label): ?>
            <label class="wcpt-df__reason">
              <input type="radio" name="wcpt_df_reason" value="<?php echo esc_attr($slug); ?>">
              <span><?php echo esc_html($label); ?></span>
            </label>
          <?php endforeach; ?>
        </fieldset>

        <label class="wcpt-df__message-label" for="wcpt-df-message">
          <?php esc_html_e('Anything else you\'d like to share? (optional)', 'wc-product-table-pro'); ?>
        </label>
        <textarea id="wcpt-df-message" name="wcpt_df_message" class="wcpt-df__message" rows="3"
          maxlength="<?php echo (int) WCPT_DEACTIVATION_FEEDBACK_MESSAGE_MAX; ?>"
          placeholder="<?php esc_attr_e('Details help us fix issues and prioritise features…', 'wc-product-table-pro'); ?>"></textarea>

        <div class="wcpt-df__actions">
          <button type="submit" class="button button-primary wcpt-df__submit">
            <?php esc_html_e('Submit & Deactivate', 'wc-product-table-pro'); ?>
          </button>
          <button type="button" class="button button-link wcpt-df__skip" data-wcpt-df-skip>
            <?php esc_html_e('Skip & Deactivate', 'wc-product-table-pro'); ?>
          </button>
        </div>
      </form>
    </div>
  </div>
  <?php
}

/**
 * Whether the configured feedback endpoint is safe to call.
 *
 * @param string $url Endpoint URL.
 * @return bool
 */
function wcpt_deactivation_feedback_url_is_allowed($url)
{
  if (!is_string($url) || $url === '') {
    return false;
  }

  $parts = wp_parse_url($url);
  if (empty($parts['scheme']) || empty($parts['host'])) {
    return false;
  }

  // Production must be HTTPS. Allow HTTP only on local/dev hosts.
  $host = strtolower($parts['host']);
  $is_local = in_array($host, array('localhost', '127.0.0.1', '::1'), true)
    || substr($host, -6) === '.local'
    || substr($host, -5) === '.test';

  if ($parts['scheme'] === 'https') {
    return true;
  }

  return $parts['scheme'] === 'http' && $is_local;
}

/**
 * AJAX: sanitize feedback and forward it to the author's server (non-blocking).
 */
function wcpt_deactivation_feedback_ajax()
{
  check_ajax_referer('wcpt_deactivation_feedback', 'nonce');

  if (!current_user_can('activate_plugins')) {
    wp_send_json_error(array('message' => 'Forbidden'), 403);
  }

  // Soft guard — never collect from Pro installs even if JS is somehow present.
  if (defined('WCPT_PRO')) {
    wp_send_json_success(array('skipped' => true));
  }

  $reason = isset($_POST['reason']) ? sanitize_key(wp_unslash($_POST['reason'])) : '';
  $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
  $allowed = array_keys(wcpt_deactivation_feedback_reasons());

  if ($reason && !in_array($reason, $allowed, true)) {
    $reason = 'other';
  }

  $max = (int) WCPT_DEACTIVATION_FEEDBACK_MESSAGE_MAX;
  if ($max > 0 && strlen($message) > $max) {
    $message = substr($message, 0, $max);
  }

  // Empty submit / skip with no reason — nothing to send.
  if ($reason === '' && $message === '') {
    wp_send_json_success(array('skipped' => true));
  }

  $endpoint = WCPT_DEACTIVATION_FEEDBACK_URL;
  if (!wcpt_deactivation_feedback_url_is_allowed($endpoint)) {
    wp_send_json_success(array('skipped' => true, 'reason' => 'invalid_endpoint'));
  }

  $payload = array(
    'reason' => $reason,
    'message' => $message,
    'plugin' => 'wc-product-table-lite',
    'plugin_version' => defined('WCPT_VERSION') ? WCPT_VERSION : '',
    'wp_version' => get_bloginfo('version'),
    'php_version' => PHP_VERSION,
    'wc_version' => defined('WC_VERSION') ? WC_VERSION : '',
    'site_url' => home_url(),
    'locale' => get_locale(),
    'submitted_at' => gmdate('c'),
  );

  $headers = array(
    'Content-Type' => 'application/json; charset=utf-8',
    'Accept' => 'application/json',
  );

  $secret = (string) WCPT_DEACTIVATION_FEEDBACK_SECRET;
  if ($secret !== '') {
    $headers['X-WCPT-Token'] = $secret;
  }

  wp_remote_post(
    $endpoint,
    array(
      'timeout' => 8,
      'blocking' => false,
      'headers' => $headers,
      'body' => wp_json_encode($payload),
      'data_format' => 'body',
      'reject_unsafe_urls' => true,
    )
  );

  wp_send_json_success(array('sent' => true));
}
