<?php
if (empty($device)) {
  $device = 'laptop';
}

$wcpt_inner_var = function ($default_var, $phone_var = '') use ($device) {
  return ($device === 'phone' && $phone_var) ? $phone_var : $default_var;
};
?>
<div wcpt-model-key="[container]">
  <!-- Product image -->
  <?php wcpt_general_style_accordion_open('Product image'); ?>
  <div class="wcpt-editor-option-row">
    <label>Table image width</label>
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-product-image-width', '--wcpt-phone-product-image-width')); ?>"
      placeholder="100px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>List image width</label>
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-list-view-product-image-width', '--wcpt-phone-list-view-product-image-width')); ?>"
      placeholder="100px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Aspect ratio</label>
    <select wcpt-model-key="--wcpt-product-image-aspect-ratio">
      <option value="">Auto</option>
      <option value="1/1">1/1</option>
      <option value="16/9">16/9</option>
      <option value="4/3">4/3</option>
      <option value="3/4">3/4</option>
      <option value="1/2">1/2</option>
      <option value="2/3">2/3</option>
      <option value="2/1">2/1</option>
    </select>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-product-image-border-radius" placeholder="4px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Product name -->
  <?php wcpt_general_style_accordion_open('Product name'); ?>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-title-font-size', '--wcpt-phone-title-font-size')); ?>"
      placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-title-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font weight</label>
    <select
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-title-font-weight', '--wcpt-phone-title-font-weight')); ?>">
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

  <!-- Default button style -->
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
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-font-size', '--wcpt-phone-button-font-size')); ?>"
      placeholder="1em">
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
      <input type="text"
        wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-padding-vertical', '--wcpt-phone-button-padding-vertical')); ?>"
        placeholder="vertical">
      <input type="text"
        wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-button-padding-horizontal', '--wcpt-phone-button-padding-horizontal')); ?>"
        placeholder="horizontal">
    </div>
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Add to cart button -->
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

  <!-- Download button -->
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

  <!-- Quantity input -->
  <?php wcpt_general_style_accordion_open('Quantity input'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-quantity-text-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Height</label>
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-quantity-height', '--wcpt-phone-quantity-height')); ?>"
      placeholder="34px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Width</label>
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-quantity-width', '--wcpt-phone-quantity-width')); ?>"
      placeholder="45px">
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

  <!-- Price -->
  <?php wcpt_general_style_accordion_open('Price'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-price-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ Regular price on sale</label>
    <input type="text" wcpt-model-key="--wcpt-price-on-sale-regular-price-text-color" placeholder="#000"
      class="wcpt-color-picker">
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
    <input type="text"
      wcpt-model-key="<?php echo esc_attr($wcpt_inner_var('--wcpt-price-font-size', '--wcpt-phone-price-font-size')); ?>"
      placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Availability -->
  <?php wcpt_general_style_accordion_open('Availability'); ?>
  <div class="wcpt-editor-option-row">
    <label>In stock color</label>
    <input type="text" wcpt-model-key="--wcpt-availability-color-in-stock" placeholder="green"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Out of stock color</label>
    <input type="text" wcpt-model-key="--wcpt-availability-color-out-of-stock" placeholder="red"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Low stock color</label>
    <input type="text" wcpt-model-key="--wcpt-availability-color-low-stock" placeholder="purple"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>On backorder color</label>
    <input type="text" wcpt-model-key="--wcpt-availability-color-on-backorder" placeholder="orange"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-availability-font-size" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>


  <!-- Description -->
  <?php wcpt_general_style_accordion_open('Description'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-description-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-description-font-size" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Attributes -->
  <?php wcpt_general_style_accordion_open('Attributes'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-text-color-hover" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-text-color-selected" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-font-size" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-attribute-term-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-attribute-term-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-attribute-term-border-width" placeholder="width">
      <input type="text" wcpt-model-key="--wcpt-attribute-term-border-color" class="wcpt-color-picker"
        placeholder="color">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-border-color-hover" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-border-color-selected" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap</label>
    <input type="text" wcpt-model-key="--wcpt-attribute-term-gap" placeholder="2px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Category -->
  <?php wcpt_general_style_accordion_open('Category'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-text-color-hover" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-text-color-selected" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-font-size" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-category-term-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-category-term-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-category-term-border-width" placeholder="width">
      <input type="text" wcpt-model-key="--wcpt-category-term-border-color" class="wcpt-color-picker"
        placeholder="color">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-border-color-hover" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-border-color-selected" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap</label>
    <input type="text" wcpt-model-key="--wcpt-category-term-gap" placeholder="2px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Tags -->
  <?php wcpt_general_style_accordion_open('Tags'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-text-color-hover" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-text-color-selected" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-font-size" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tag-term-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-tag-term-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tag-term-border-width" placeholder="width">
      <input type="text" wcpt-model-key="--wcpt-tag-term-border-color" class="wcpt-color-picker" placeholder="color">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-border-color-hover" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ selected</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-border-color-selected" class="wcpt-color-picker"
      placeholder="color">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap</label>
    <input type="text" wcpt-model-key="--wcpt-tag-term-gap" placeholder="2px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- On sale -->
  <?php wcpt_general_style_accordion_open('On sale'); ?>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-on-sale-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-on-sale-background-color" placeholder="#fff176" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-on-sale-font-size" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- SKU -->
  <?php wcpt_general_style_accordion_open('SKU'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-sku-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-sku-color-hover" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-sku-font-size" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Total -->
  <?php wcpt_general_style_accordion_open('Total'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-total-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Empty total color</label>
    <input type="text" wcpt-model-key="--wcpt-total-empty-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-total-font-size" placeholder="1em">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Tooltip -->
  <?php wcpt_general_style_accordion_open('Tooltip'); ?>

  <!-- Tooltip label -->
  <?php wcpt_general_style_accordion_open('Label'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-label-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-label-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>↳ on hover</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-label-text-color-hover" placeholder="#000"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-label-text-size" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tooltip-label-border-width" placeholder="width">
      <input type="text" wcpt-model-key="--wcpt-tooltip-label-border-color" class="wcpt-color-picker"
        placeholder="color">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-label-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tooltip-label-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-tooltip-label-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Tooltip content -->
  <?php wcpt_general_style_accordion_open('Content'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-content-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Text color</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-content-text-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-content-text-size" placeholder="1em">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tooltip-content-border-width" placeholder="width">
      <input type="text" wcpt-model-key="--wcpt-tooltip-content-border-color" class="wcpt-color-picker"
        placeholder="color">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-content-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-tooltip-content-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-tooltip-content-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Max width</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-content-max-width" placeholder="200px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap from label</label>
    <input type="text" wcpt-model-key="--wcpt-tooltip-gap" placeholder="14px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Select variation -->
  <?php wcpt_general_style_accordion_open('Select variation'); ?>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-color" placeholder="#000" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Font size</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-font-size" placeholder="1em">
  </div>

  <?php wcpt_general_style_accordion_open('Select box'); ?>
  <div class="wcpt-editor-option-row">
    <label>Background color</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-select-background-color" class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Width</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-select-width" placeholder="auto">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Max width</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-select-max-width" placeholder="100%">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border radius</label>
    <input type="text" wcpt-model-key="--wcpt-select-variation-select-border-radius" placeholder="4px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Padding</label>
    <div class="wcpt-flex-option-container">
      <input type="text" wcpt-model-key="--wcpt-select-variation-select-padding-vertical" placeholder="vertical">
      <input type="text" wcpt-model-key="--wcpt-select-variation-select-padding-horizontal" placeholder="horizontal">
    </div>
  </div>
  <?php wcpt_general_style_accordion_close(); ?>

  <?php wcpt_general_style_accordion_close(); ?>

  <!-- Line separator -->
  <?php wcpt_general_style_accordion_open('Line separator'); ?>
  <div class="wcpt-editor-option-row">
    <label>Height</label>
    <input type="text" wcpt-model-key="--wcpt-line-separator-height" placeholder="2px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Color</label>
    <input type="text" wcpt-model-key="--wcpt-line-separator-background-color" placeholder="rgba(0, 0, 0, 0.05)"
      class="wcpt-color-picker">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Border style</label>
    <select wcpt-model-key="--wcpt-line-separator-border-style">
      <option value="">Auto</option>
      <option value="solid">Solid</option>
      <option value="dashed">Dashed</option>
      <option value="dotted">Dotted</option>
      <option value="none">None</option>
    </select>
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap above</label>
    <input type="text" wcpt-model-key="--wcpt-line-separator-gap-above" placeholder="6px">
  </div>
  <div class="wcpt-editor-option-row">
    <label>Gap below</label>
    <input type="text" wcpt-model-key="--wcpt-line-separator-gap-below" placeholder="6px">
  </div>
  <?php wcpt_general_style_accordion_close(); ?>


</div>