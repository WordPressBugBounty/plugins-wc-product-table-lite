<?php
if (empty($device)) {
  $device = 'laptop';
}

$wcpt_inner_var = function ($default_var, $phone_var = '') use ($device) {
  return ($device === 'phone' && $phone_var) ? $phone_var : $default_var;
};
?>
<div wcpt-model-key="[container]">
  <?php wcpt_general_style_accordion_open('Product image'); ?>
  <div class="wcpt-editor-option-row">
    <label>Table image width</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-product-image-width', '--wcpt-phone-product-image-width')); ?>" placeholder="100px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>List image width</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-list-view-product-image-width', '--wcpt-phone-list-view-product-image-width')); ?>" placeholder="100px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-product-image-border-radius" placeholder="4px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Product name'); ?>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-title-font-size', '--wcpt-phone-title-font-size')); ?>" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-title-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font weight</label>
    <select wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-title-font-weight', '--wcpt-phone-title-font-weight')); ?>">
      <option value=""></option>
      <option value="normal">Normal</option>
      <option value="bold">Bold</option>
      <option value="lighter">Lighter</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
      <option value="600">600</option>
      <option value="700">700</option>
      <option value="800">800</option>
      <option value="900">900</option>
    </select>
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Default button style'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background</label>
    <input type="text" wcpt-model-key="--wcpt-button-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-button-background-color-hover" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-button-text-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-font-size', '--wcpt-phone-button-font-size')); ?>" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font weight</label>
    <select wcpt-model-key="--wcpt-button-font-weight">
      <option value=""></option>
      <option value="normal">Normal</option>
      <option value="bold">Bold</option>
      <option value="lighter">Lighter</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
      <option value="600">600</option>
      <option value="700">700</option>
      <option value="800">800</option>
      <option value="900">900</option>
    </select>
  </div>
  <div class="wcpt-editor-option-row wcpt-borders-style">
    <label>Border</label>
    <input type="text" wcpt-model-key="--wcpt-border-width" placeholder="width">
    <select wcpt-model-key="--wcpt-button-border-style">
      <option value=""></option>
      <option value="solid">Solid</option>
      <option value="dashed">Dashed</option>
      <option value="dotted">Dotted</option>
      <option value="none">None</option>
    </select>
    <input type="text" wcpt-model-key="--wcpt-button-border-color" class="wcpt-color-picker" placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-button-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-padding-vertical', '--wcpt-phone-button-padding-vertical')); ?>" placeholder="vertical">
      <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-padding-horizontal', '--wcpt-phone-button-padding-horizontal')); ?>" placeholder="horizontal">
    </div>
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Add to cart button'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background</label>
    <input type="text" wcpt-model-key="--wcpt-add-to-cart-button-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-add-to-cart-button-background-color-hover" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-add-to-cart-button-text-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border color</label>
    <input type="text" wcpt-model-key="--wcpt-add-to-cart-button-border-color" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Download button'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background</label>
    <input type="text" wcpt-model-key="--wcpt-download-button-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-download-button-background-color-hover" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-download-button-text-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border color</label>
    <input type="text" wcpt-model-key="--wcpt-download-button-border-color" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Quantity input'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-text-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Height</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-quantity-height', '--wcpt-phone-quantity-height')); ?>" placeholder="34px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Width</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-quantity-width', '--wcpt-phone-quantity-width')); ?>" placeholder="45px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-border-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Button background color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-button-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Icon color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-button-icon-color" class="wcpt-color-picker">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_open('Price'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-price-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font weight</label>
    <select wcpt-model-key="--wcpt-price-font-weight">
      <option value=""></option>
      <option value="normal">Normal</option>
      <option value="bold">Bold</option>
      <option value="lighter">Lighter</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
      <option value="600">600</option>
      <option value="700">700</option>
      <option value="800">800</option>
      <option value="900">900</option>
    </select>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-price-font-size', '--wcpt-phone-price-font-size')); ?>" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>
</div>
