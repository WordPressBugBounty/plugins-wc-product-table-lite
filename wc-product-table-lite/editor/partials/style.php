<!-- CSS -->
<div class="wcpt-editor-option-row">
  <label>
    <span style="font-weight: 600; font-size: 18px;">
      Custom CSS
    </span>
    <span class="wcpt-selectors wcpt-toggle wcpt-toggle-off">
      <span class="wcpt-toggle-trigger wcpt-noselect">
        <?php echo wcpt_icon('chevron-down', 'wcpt-toggle-is-off'); ?>
        <?php echo wcpt_icon('chevron-up', 'wcpt-toggle-is-on'); ?>
        Show CSS selectors
      </span>
      <span class="wcpt-toggle-tray wcpt-reference-popover">

        <?php echo wcpt_icon('x', 'wcpt-toggle-x'); ?>

        <table>
          <thead>
            <tr>
              <td><strong>Selector</strong></td>
              <td><strong>Description</strong></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>[container]</td>
              <td>Target the entire container with table and navigation elements (filters, pagination)</td>
            </tr>
            <tr>
              <td>[id]</td>
              <td>Placeholder for the table post id</td>
            </tr>
            <tr>
              <td>[table]</td>
              <td>Target the table</td>
            </tr>
            <tr>
              <td>[heading_row]</td>
              <td>Target the heading row</td>
            </tr>
            <tr>
              <td>[heading_cell]</td>
              <td>Target the heading cells</td>
            </tr>
            <tr>
              <td>[heading_cell_even]</td>
              <td>Target even heading cells</td>
            </tr>
            <tr>
              <td>[heading_cell_odd]</td>
              <td>Target odd heading cells</td>
            </tr>
            <tr>
              <td>[row]</td>
              <td>Target the table row element</td>
            </tr>
            <tr>
              <td>[row_even]</td>
              <td>Target even rows</td>
            </tr>
            <tr>
              <td>[row_odd]</td>
              <td>Target odd rows</td>
            </tr>
            <tr>
              <td>[cell]</td>
              <td>Target all the table cells</td>
            </tr>
            <tr>
              <td>[cell_even]</td>
              <td>Target even column cells</td>
            </tr>
            <tr>
              <td>[cell_odd]</td>
              <td>Target odd column cells</td>
            </tr>
            <tr>
              <td>[tablet] ... [/tablet]</td>
              <td>Replace '...' with the css code meant only for tablet size devices</td>
            </tr>
            <tr>
              <td>[phone] ... [/phone]</td>
              <td>Replace '...' with the css code meant only for phone size devices</td>
            </tr>
          </tbody>
        </table>

      </span>
    </span>
  </label>
  <textarea class="wcpt-style" id="wcpt-css" wcpt-model-key="css"
    placeholder="<?php _e("Enter custom CSS here...", "wc-product-table"); ?>"></textarea>
</div>

<?php
$style_devices = array(
  'laptop' => array(
    'label' => 'Laptop',
    'icon' => 'laptop',
  ),
  'tablet' => array(
    'label' => 'Tablet',
    'icon' => 'tablet',
  ),
  'phone' => array(
    'label' => 'Phone',
    'icon' => 'smartphone',
  ),
  'navigation' => array(
    'label' => 'Navigation',
    'icon' => 'filter',
  ),
);
?>

<div class="wcpt-tabs wcpt-style-device-tabs">
  <div class="wcpt-tab-triggers">
    <?php foreach ($style_devices as $device_key => $device_meta) { ?>
      <div class="wcpt-tab-trigger" data-wcpt-style-device="<?php echo esc_attr($device_key); ?>">
        <img class="wcpt-style-device-icon wcpt-style-device-icon--<?php echo esc_attr($device_key); ?>"
          src="<?php echo esc_url(WCPT_PLUGIN_URL . 'assets/feather/' . $device_meta['icon'] . '.svg'); ?>" alt="">
        <span><?php echo esc_html($device_meta['label']); ?></span>
      </div>
    <?php } ?>
  </div>

  <?php
  foreach (array('laptop', 'tablet', 'phone') as $device) {
    ?>
    <div class="wcpt-tab-content wcpt-device-style" data-wcpt-device="<?php echo $device; ?>"
      wcpt-model-key="<?php echo $device; ?>">
      <?php
      // inheritance option — first option for tablet and phone
      if (in_array($device, array('phone', 'tablet'))) {
        $label = "Inherit " . ($device == 'tablet' ? 'Laptop' : 'Tablet') . " Style";
        $model_key = str_replace(' ', '_', strtolower($label));
        ?>
        <div class="wcpt-editor-option-row wcpt-inheritance-option">
          <label>
            <input type="checkbox" wcpt-model-key="<?php echo $model_key; ?>">
            <?php echo $label; ?>
          </label>
        </div>
        <?php
      }

      $style_partials = array(
        'container' => array('name' => 'Outer container', 'selector' => '', ),
        'text' => array('name' => 'Text', 'selector' => '', ),
        'headings' => array('name' => 'Column headings', 'selector' => '', ),
        'cells' => array('name' => 'Column cells', 'selector' => '[container] .wcpt-cell', ),
        'odd_rows' => array('name' => 'Odd rows', 'selector' => '', ),
        'even_rows' => array('name' => 'Even rows', 'selector' => '', ),
        'borders' => array('name' => 'Table borders', 'selector' => '', ),
        'list_layout' => array('name' => 'List layout', 'selector' => '', ),
        'inner_elements' => array('name' => 'Inner elements', 'selector' => '', )
      );

      foreach ($style_partials as $elm => $data) {
        ?>
        <!-- <?php echo $elm; ?> -->
        <div class="wcpt-editor-option-row wcpt-toggle-options" <?php if ($data['selector'])
          echo 'wcpt-model-key="' . $data['selector'] . '"' ?>>
            <span class="wcpt-toggle-label">
            <?php echo wcpt_icon('paint-brush'); ?>
            <?php
            echo $data['name'];
            ?>
            <?php wcpt_icon('chevron-down') ?>
          </span>
          <div class="wcpt-wrapper">
            <?php require(__DIR__ . '/style/' . $elm . '.php'); ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  }
  ?>

  <!-- Navigation style -->
  <div class="wcpt-tab-content wcpt-device-style" data-wcpt-device="navigation" wcpt-model-key="navigation">
    <?php
    $style_partials = array(
      'header' => 'Header above table',
      'sidebar' => 'Sidebar',
      'modal' => 'Modal popup on phones',
      'pagination' => 'Pagination buttons'
    );
    foreach ($style_partials as $elm => $name) {
      ?>
      <!-- <?php echo $elm; ?> -->
      <div class="wcpt-editor-option-row wcpt-toggle-options">
        <span class="wcpt-toggle-label">
          <?php echo wcpt_icon('paint-brush'); ?>
          <?php echo $name; ?>
          <?php wcpt_icon('chevron-down') ?>
        </span>
        <div class="wcpt-wrapper">
          <?php require(__DIR__ . '/style/' . $elm . '.php'); ?>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>