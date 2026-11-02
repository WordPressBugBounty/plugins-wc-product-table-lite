<!-- heading -->
<div class="wcpt-editor-row-option">
  <label>Heading</label>
  <div wcpt-block-editor wcpt-model-key="heading"></div>
</div>

<?php require('nav_filter_display_type.php'); ?>

<!-- label -->
<div class="wcpt-editor-row-option">
  <label>"Only on sale items" label</label>
  <div wcpt-model-key="on_sale_label" wcpt-block-editor wcpt-be-add-row="0"></div>
</div>

<!-- accordion always open -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="position"
  wcpt-condition-val="left_sidebar">
  <label>
    <input type="checkbox" wcpt-model-key="accordion_always_open"> Keep filter open by default in sidebar
  </label>
</div>

<?php include('style/filter.php'); ?>