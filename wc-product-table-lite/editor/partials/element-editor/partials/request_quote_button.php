<?php
if (!defined('YITH_YWRAQ_PREMIUM') && !defined('YITH_YWRAQ_VERSION')) {
  ?>
  <div class="wcpt-notice">
    Note: To use this element you need to have the premium plugin <a target="_blank"
      href="https://yithemes.com/themes/plugins/yith-woocommerce-request-a-quote/?refer_id=1085714">'YITH WooCommerce Request a Quote'</a> installed and
    activated on your site. This is a compatible 3rd party WooCommerce request a quote plugin.
  </div>
  <?php
}
?>

<!-- label -->
<div class="wcpt-editor-row-option">
  <label>
    Button text label
  </label>
  <input type="text" wcpt-model-key="label_text" placeholder="Request quote" />
</div>

<!-- icon -->
<div class="wcpt-editor-row-option">
  <label>
    Button icon
  </label>
  <select wcpt-model-key="label_icon" style="width: 100%;">
    <option value="">None</option>
    <option value="file-text">File with text sign</option>
    <option value="file-plus">File with plus sign</option>
    <option value="file">File with no sign</option>
    <option value="mail">Mail</option>
    <option value="plus-circle">Plus circle</option>
  </select>
</div>

<div class="wcpt-editor-row-option">
  <label>HTML Class</label>
  <input type="text" wcpt-model-key="html_class" />
</div>

<div class="wcpt-editor-row-option" wcpt-model-key="style">

  <div class="wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id]">

    <span class="wcpt-toggle-label">
      <?php echo wcpt_icon('paint-brush'); ?>
      Style for Request quote button
      <?php echo wcpt_icon('chevron-down'); ?>
    </span>

    <!-- font-size -->
    <div class="wcpt-editor-row-option">
      <label>Font size</label>
      <input type="text" wcpt-model-key="font-size" />
    </div>

    <!-- font color -->
    <div class="wcpt-editor-row-option">
      <label>Font color</label>
      <input type="text" wcpt-model-key="color" placeholder="#000" class="wcpt-color-picker">
    </div>

    <!-- font color on hover -->
    <div class="wcpt-editor-row-option">
      <label>↳ color on hover</label>
      <input type="text" wcpt-model-key="color:hover" placeholder="#000" class="wcpt-color-picker">
    </div>

    <!-- font-weight -->
    <div class="wcpt-editor-row-option">
      <label>Font weight</label>
      <select wcpt-model-key="font-weight">
        <option value="">Auto</option>
        <option value="normal">Normal</option>
        <option value="bold">Bold</option>
        <option value="lighter">Light</option>
      </select>
    </div>

    <!-- background color -->
    <div class="wcpt-editor-row-option">
      <label>Background color</label>
      <input type="text" wcpt-model-key="background-color" class="wcpt-color-picker">
    </div>

    <!-- background color on hover -->
    <div class="wcpt-editor-row-option">
      <label>↳ color on hover</label>
      <input type="text" wcpt-model-key="background-color:hover" class="wcpt-color-picker">
    </div>

    <!-- border -->
    <div class="wcpt-editor-row-option wcpt-borders-style">
      <label>Border</label>
      <input type="text" wcpt-model-key="border-width" placeholder="width">
      <select wcpt-model-key="border-style">
        <option value="">Auto</option>
        <option value="solid">Solid</option>
        <option value="dashed">Dashed</option>
        <option value="dotted">Dotted</option>
        <option value="none">None</option>
      </select>
      <input type="text" wcpt-model-key="border-color" class="wcpt-color-picker" placeholder="color">
    </div>

    <!-- border-color on hover -->
    <div class="wcpt-editor-row-option">
      <label>Border color on hover</label>
      <input type="text" wcpt-model-key="border-color:hover" class="wcpt-color-picker" placeholder="color">
    </div>

    <!-- border-radius -->
    <div class="wcpt-editor-row-option">
      <label>Border radius</label>
      <input type="text" wcpt-model-key="border-radius">
    </div>

    <!-- stroke-width -->
    <div class="wcpt-editor-row-option">
      <label>Icon thickness</label>
      <input type="text" wcpt-model-key="stroke-width" placeholder="2px">
    </div>

    <!-- width -->
    <div class="wcpt-editor-row-option">
      <label>Width</label>
      <input type="text" wcpt-model-key="width" />
    </div>

    <!-- padding -->
    <div class="wcpt-editor-row-option">
      <label>Padding</label>
      <div class="wcpt-flex-option-container">
        <input type="text" wcpt-model-key="padding-top" placeholder="top">
        <input type="text" wcpt-model-key="padding-right" placeholder="right">
        <input type="text" wcpt-model-key="padding-bottom" placeholder="bottom">
        <input type="text" wcpt-model-key="padding-left" placeholder="left">
      </div>
    </div>
  </div>

</div>

<!-- condition -->
<?php include('condition/outer.php'); ?>
