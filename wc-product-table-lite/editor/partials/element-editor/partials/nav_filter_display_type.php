<?php
/**
 * Shared nav filter display options.
 *
 * Optional flags (set before include):
 * - $wcpt_nav_filter_display_heading_separate_line = true  (price / custom field)
 * - $wcpt_nav_filter_display_skip_option_layout = true     (date picker — no option list)
 */
if (!isset($wcpt_nav_filter_display_heading_separate_line)) {
  $wcpt_nav_filter_display_heading_separate_line = false;
}
if (!isset($wcpt_nav_filter_display_skip_option_layout)) {
  $wcpt_nav_filter_display_skip_option_layout = false;
}
?>

<!-- display type (header + sidebar) -->
<div class="wcpt-editor-row-option wcpt-nav-filter-display-type" wcpt-panel-condition="prop" wcpt-condition-prop="position"
  wcpt-condition-val="header||left_sidebar">
  <label>Display type</label>
  <select wcpt-model-key="display_type">
    <option value="dropdown">Dropdown</option>
    <option value="combobox">Combobox</option>
    <option value="row">Buttons</option>
  </select>
  <small wcpt-panel-condition="prop" wcpt-condition-prop="position" wcpt-condition-val="left_sidebar">
    In the sidebar, Dropdown is an accordion list. Combobox keeps a floating menu. Buttons shows options as inline
    buttons.
  </small>
</div>

<!-- combobox placeholder -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
  wcpt-condition-val="header||left_sidebar">
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
    wcpt-condition-val="combobox">
    <label>
      Combobox placeholder
      <small>Shown inside the closed dropdown before an option is selected. The Heading field is placed above the
        dropdown.</small>
    </label>
    <input type="text" wcpt-model-key="combobox_placeholder" placeholder="Select...">
  </div>
</div>

<!-- open menu on (dropdown / combobox) — header only; sidebar uses click -->
<div class="wcpt-editor-row-option wcpt-nav-filter-open-menu" wcpt-panel-condition="prop" wcpt-condition-prop="position"
  wcpt-condition-val="header">
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
    wcpt-condition-val="dropdown||combobox">
    <label>
      Open menu on
      <small>Hover opens the menu when the pointer enters the control. Click opens only when the control is
        clicked. Touch devices always use click.</small>
    </label>
    <select wcpt-model-key="open_menu_on">
      <option value="hover">Hover (default)</option>
      <option value="click">Click</option>
    </select>
  </div>
</div>

<?php if ($wcpt_nav_filter_display_heading_separate_line): ?>
  <!-- heading separate line -->
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
    wcpt-condition-val="header||left_sidebar">
    <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
      wcpt-condition-val="row">
      <label>
        <input type="checkbox" wcpt-model-key="heading_separate_line" />
        Show heading in separate line above
      </label>
    </div>
  </div>
<?php endif; ?>

<?php if (!$wcpt_nav_filter_display_skip_option_layout): ?>

  <!-- option columns: header (any display type) -->
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
    wcpt-condition-val="header">
    <label>
      Show option in columns
      <small>Arrange filter options in multiple columns. Choose No for a single
        list.</small>
    </label>
    <select wcpt-model-key="option_columns">
      <option value="1">No</option>
      <option value="2">2 columns</option>
      <option value="3">3 columns</option>
    </select>
  </div>

  <!-- option columns: sidebar (dropdown / combobox / buttons) -->
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
    wcpt-condition-val="left_sidebar">
    <label>
      Show option in columns
      <small>Arrange filter options in multiple columns. Choose No for a single
        list.</small>
    </label>
    <select wcpt-model-key="option_columns">
      <option value="1">No</option>
      <option value="2">2 columns</option>
      <option value="3">3 columns</option>
    </select>
  </div>

  <!-- hide checkbox / radio — only for row of buttons -->
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
    wcpt-condition-val="header||left_sidebar">
    <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
      wcpt-condition-val="row">
      <label>
        <input type="checkbox" wcpt-model-key="hide_option_input" />
        Hide checkbox / radio control on each option
        <small>Options still toggle when clicked; only the control is hidden.</small>
      </label>
    </div>
  </div>

<?php endif; ?>

<?php
unset($wcpt_nav_filter_display_heading_separate_line, $wcpt_nav_filter_display_skip_option_layout);
?>