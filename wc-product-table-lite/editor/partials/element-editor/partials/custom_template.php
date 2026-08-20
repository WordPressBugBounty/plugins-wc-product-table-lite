<div class="wcpt-editor-row-option">
  <label class="wcpt-element-note">
    Add a PHP template file in your theme folder at
    <code>/wc-product-table/{template name}.php</code>
    so you can insert custom markup into the table. Child theme files take priority over the parent theme.
  </label>
</div>

<div class="wcpt-editor-row-option">
  <label>Template file name</label>
  <input type="text" wcpt-model-key="template_name" placeholder="my-template">
  <label>
    <small>Enter the file name only, with or without <code>.php</code>. Example: <code>my-template</code> loads
      <code>your-theme/wc-product-table/my-template.php</code>.</small>
  </label>
</div>

<?php
$element_name = 'Custom template';
include('style/common.php');
?>

<?php include('condition/outer.php'); ?>