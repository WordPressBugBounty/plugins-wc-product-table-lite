<?php
if (get_option('woocommerce_hide_out_of_stock_items', 'no') == 'yes') {
  ?>
  <span class="wcpt-notice" style="margin: 30px 0 0;">
    To enable this filter, please uncheck 'Out of stock visibility'
    <a href="<?php echo get_admin_url(); ?>admin.php?page=wc-settings&tab=products&section=inventory"
      target="_blank">here</a>. Otherwise out of stock items will remain hidden regardless of filter.
  </span>
  <?php
  return;
}
?>
<!-- heading -->
<div class="wcpt-editor-row-option">
  <label>Heading</label>
  <div wcpt-block-editor wcpt-be-add-element-partial="add-navigation-filter-heading-element" wcpt-model-key="heading">
  </div>
</div>

<?php require('nav_filter_display_type.php'); ?>

<div class="wcpt-editor-row-option">
  <label>Options</label>
  <select wcpt-model-key="options_mode">
    <option value="single">Single option — Hide out of stock / Show available</option>
    <option value="all_three">All three — Available / Out of stock / All</option>
  </select>
  <small>
    Single keeps the classic checkbox. All three lets shoppers pick Available (in stock + backorder), Out of stock, or
    All.
    Existing tables without this setting keep the single option.
  </small>
</div>

<!-- Single mode labels (also when options_mode is unset on older tables) -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="!all_three">
  <label class="wcpt-editor-options-heading">Option label</label>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="!all_three">
  <label>"Hide out of stock" / Available label</label>
  <div wcpt-model-key="hide_label" wcpt-block-editor wcpt-be-add-row="0"></div>
  <small>Checked = show available products only (in stock + on backorder).</small>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="!all_three">
  <label>Clear filter label</label>
  <input type="text" wcpt-model-key="clear_filter_label" placeholder="Available">
  <small>Leave empty to hide the clear chip.</small>
</div>

<!-- All three mode labels -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label class="wcpt-editor-options-heading">Option labels</label>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label>"Available" label</label>
  <div wcpt-model-key="available_label" wcpt-block-editor wcpt-be-add-row="0"></div>
  <small>Means in stock or on backorder (same as hide out of stock).</small>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label>"Out of stock" label</label>
  <div wcpt-model-key="out_of_stock_label" wcpt-block-editor wcpt-be-add-row="0"></div>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label>"Show all" label</label>
  <div wcpt-model-key="all_label" wcpt-block-editor wcpt-be-add-row="0"></div>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label class="wcpt-editor-options-heading">Clear filter labels</label>
  <small>Leave empty to hide that clear chip.</small>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label>Clear label — Available</label>
  <input type="text" wcpt-model-key="clear_filter_label_available" placeholder="Available">
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="options_mode"
  wcpt-condition-val="all_three">
  <label>Clear label — Out of stock</label>
  <input type="text" wcpt-model-key="clear_filter_label_out_of_stock" placeholder="Out of stock">
</div>

<!-- accordion always open -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
  wcpt-condition-val="left_sidebar">
  <label>
    <input type="checkbox" wcpt-model-key="accordion_always_open"> Keep filter open by default in sidebar
  </label>
</div>

<?php include('style/filter.php'); ?>