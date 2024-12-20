<!-- size -->
<div class="wcpt-editor-row-option">
  <label>
    Select image file
    <small>Note: WooCommerce saves multiple versions of the product image at different file sizes and crops. This option
      lets you pick a suitable version. Select a larger file size if the image appears blurry in your table or a smaller
      image file size if you are displaying image in a tiny box and want to reduce image loading time. This option does
      <em>not</em> control the image width. For that open the 'Style for Product Image' settings section below and
      change the 'Width' option there.</small>
  </label>
  <select wcpt-model-key="size">
    <?php
    foreach (wcpt_get_all_image_sizes() as $image_size => $details) {
      echo "<option value='" . $image_size . "'>";
      echo ucfirst(str_replace('_', ' ', $image_size)) . " (";
      $_details = "";
      if ($details['width']) {
        $_details .= "w: " . $details['width'] . "px | ";
      }
      if ($details['height']) {
        $_details .= "h: " . $details['height'] . "px | ";
      }
      $_details .= " cropped: " . ($details['crop'] ? "true" : "false") . " | ";
      echo rtrim($_details, " | ");
      echo ")</option>";
    }
    ?>
  </select>
</div>

<!-- enable placeholder -->
<div class="wcpt-editor-row-option">
  <label>
    <input type="checkbox" wcpt-model-key="placeholder_enabled">
    Display placeholder if the image is not available
  </label>
</div>

<!-- hover switch -->
<div class="wcpt-editor-row-option">
  <?php wcpt_pro_checkbox(true, 'Switch to first gallery image on hover', 'hover_switch_enabled'); ?>
</div>

<!-- image count -->
<div class="wcpt-editor-row-option">
  <?php wcpt_pro_checkbox(true, 'Display image gallery count in corner', 'image_count_enabled'); ?>
</div>

<!-- click action -->
<div class="wcpt-editor-row-option">
  <label>
    Action on click
  </label>
  <select wcpt-model-key="click_action">
    <option value="">Do nothing</option>
    <option value="product_page">Open product page</option>
    <option value="product_page_new">Open product page in a new tab</option>
    <option value="image_page_new">Show full size image in a new tab</option>
    <?php wcpt_pro_option('lightbox', 'Display image in lightbox'); ?>
    <?php wcpt_pro_option('download', 'Download image'); ?>
  </select>
</div>

<!-- icon when -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="click_action"
  wcpt-condition-val="lightbox">
  <label>
    Show lightbox icon when
  </label>
  <select wcpt-model-key="icon_when">
    <option value="always">Always</option>
    <option value="row_hover">Row is hovered upon</option>
    <option value="image_hover">Image is hovered upon</option>
    <option value="image_hover_hide">Hide when image is hovered upon</option>
    <option value="never">Never</option>
  </select>
</div>

<!-- icon position -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="click_action"
  wcpt-condition-val="lightbox">
  <div class="wcpt-editor-row-option">
    <label>
      Lightbox icon position
    </label>
    <select wcpt-model-key="icon_position">
      <option value="bottom_right">Bottom right</option>
      <option value="outside_right">Outside right</option>
    </select>
  </div>

  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="include_gallery">
      Include gallery images in lightbox
    </label>
  </div>
</div>

<!-- zoom trigger -->
<div class="wcpt-editor-row-option">
  <label>
    Zoom image when
    <?php wcpt_pro_badge(); ?>
  </label>
  <div class="<?php wcpt_pro_cover() ?>">
    <select wcpt-model-key="zoom_trigger">
      <option value="">Never</option>
      <option value="row_hover">Row is hovered upon</option>
      <option value="image_hover">Image is hovered upon</option>
    </select>
  </div>
</div>

<!-- zoom scale -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="zoom_trigger"
  wcpt-condition-val="row_hover||image_hover">
  <label>
    Zoom scale level
  </label>
  <select wcpt-model-key="zoom_scale">
    <option value="1.05">1.05x</option>
    <option value="1.25">1.25x</option>
    <option value="1.5">1.5x</option>
    <option value="1.75">1.75x</option>
    <option value="2.0">2.0x</option>
    <option value="2.25">2.25x</option>
    <option value="2.5">2.5x</option>
    <option value="2.75">2.75x</option>
    <option value="3.0">3.0x</option>
    <option value="custom">Custom</option>
  </select>
</div>

<!-- zoom scale -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="zoom_scale"
  wcpt-condition-val="custom">
  <label>
    Custom zoom scale level
    <small>Enter a decimal value like 3.0 without any alphabets.</small>
  </label>
  <input type="text" wcpt-model-key="custom_zoom_scale" />
</div>

<!-- offset zoom enabled -->
<div class="wcpt-editor-row-option">
  <?php wcpt_pro_checkbox(true, 'Show an offset, enlarged version of image on hover', 'offset_zoom_enabled'); ?>
</div>

<div class="wcpt-editor-row-option">
  <div wcpt-model-key="style">
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion wcpt-open" wcpt-model-key="[id]">

      <span class="wcpt-toggle-label">
        Style for Product Image
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <!-- width -->
      <!-- <div class="wcpt-editor-row-option">
        <label>Width</label>
        <input type="text" wcpt-model-key="width" />
      </div> -->

      <!-- height -->
      <!-- <div class="wcpt-editor-row-option">
        <label>Height</label>
        <input type="text" wcpt-model-key="height" />
      </div> -->

      <!-- max-width -->
      <div class="wcpt-editor-row-option">
        <label>
          Width
          <small>Use this option to set the image display width.</small>
        </label>
        <input type="text" wcpt-model-key="max-width" />
      </div>

      <!-- max-height -->
      <!-- <div class="wcpt-editor-row-option">
        <label>Max height</label>
        <input type="text" wcpt-model-key="max-height" />
      </div> -->

      <!-- border -->
      <div class="wcpt-editor-row-option wcpt-borders-style">
        <label>Border</label>
        <input type="text" wcpt-model-key="border-width" placeholder="width">
        <select wcpt-model-key="border-style">
          <option value="solid">Solid</option>
          <option value="dashed">Dashed</option>
          <option value="dotted">Dotted</option>
          <option value="none">None</option>
        </select>
        <input type="text" wcpt-model-key="border-color" class="wcpt-color-picker" placeholder="color">
      </div>

      <!-- border-radius -->
      <div class="wcpt-editor-row-option">
        <label>Border radius</label>
        <input type="text" wcpt-model-key="border-radius">
      </div>

      <!-- padding -->
      <div class="wcpt-editor-row-option">
        <label>Padding</label>
        <input type="text" wcpt-model-key="padding-top" placeholder="top">
        <input type="text" wcpt-model-key="padding-right" placeholder="right">
        <input type="text" wcpt-model-key="padding-bottom" placeholder="bottom">
        <input type="text" wcpt-model-key="padding-left" placeholder="left">
      </div>

      <!-- margin -->
      <div class="wcpt-editor-row-option">
        <label>Margin</label>
        <input type="text" wcpt-model-key="margin-top" placeholder="top">
        <input type="text" wcpt-model-key="margin-right" placeholder="right">
        <input type="text" wcpt-model-key="margin-bottom" placeholder="bottom">
        <input type="text" wcpt-model-key="margin-left" placeholder="left">
      </div>

    </div>
  </div>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="click_action"
  wcpt-condition-val="lightbox">

  <!-- lightbox icon -->
  <div class="wcpt-editor-row-option">
    <div wcpt-model-key="style">
      <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion"
        wcpt-model-key="[id] > .wcpt-lightbox-icon">

        <span class="wcpt-toggle-label">
          Style for LightBox Icon
          <?php echo wcpt_icon('chevron-down'); ?>
        </span>

        <!-- color -->
        <div class="wcpt-editor-row-option">
          <label>Color</label>
          <input type="text" wcpt-model-key="color" />
        </div>

        <!-- background-color -->
        <div class="wcpt-editor-row-option">
          <label>Background color</label>
          <input type="text" wcpt-model-key="background-color" />
        </div>

        <!-- size -->
        <div class="wcpt-editor-row-option">
          <label>Size (px)</label>
          <input type="number" wcpt-model-key="font-size" />
        </div>

        <!-- border -->
        <div class="wcpt-editor-row-option wcpt-borders-style">
          <label>Border</label>
          <input type="text" wcpt-model-key="border-width" placeholder="width">
          <select wcpt-model-key="border-style">
            <option value="solid">Solid</option>
            <option value="dashed">Dashed</option>
            <option value="dotted">Dotted</option>
            <option value="none">None</option>
          </select>
          <input type="text" wcpt-model-key="border-color" class="wcpt-color-picker" placeholder="color">
        </div>

        <!-- border-radius -->
        <div class="wcpt-editor-row-option">
          <label>Border radius</label>
          <input type="text" wcpt-model-key="border-radius">
        </div>

      </div>
    </div>

  </div>

  <!-- lightbox -->
  <div class="wcpt-editor-row-option">
    <!-- <div wcpt-model-key="style"> -->
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion">

      <span class="wcpt-toggle-label">
        Style for LightBox
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <div class="wcpt-editor-row-option">
        <label>Color theme:</label>
        <label>
          <input value="black" type="radio" wcpt-model-key="lightbox_color_theme"> Black
        </label>
        <label>
          <input value="white" type="radio" wcpt-model-key="lightbox_color_theme"> White
        </label>
      </div>

    </div>
    <!-- </div> -->
  </div>

</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="offset_zoom_enabled"
  wcpt-condition-val="true">
  <div wcpt-model-key="style">
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id]--offset-zoom-image">

      <span class="wcpt-toggle-label">
        Style for Offset Zoom Image
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <!-- max-width -->
      <div class="wcpt-editor-row-option">
        <label>
          Max width
          <small>Image width can be smaller but will never exceed this value</small>
        </label>
        <input type="text" wcpt-model-key="max-width" />
      </div>

      <!-- border -->
      <div class="wcpt-editor-row-option wcpt-borders-style">
        <label>Border</label>
        <input type="text" wcpt-model-key="border-width" placeholder="width">
        <select wcpt-model-key="border-style">
          <option value="solid">Solid</option>
          <option value="dashed">Dashed</option>
          <option value="dotted">Dotted</option>
          <option value="none">None</option>
        </select>
        <input type="text" wcpt-model-key="border-color" class="wcpt-color-picker" placeholder="color">
      </div>

      <!-- border-radius -->
      <div class="wcpt-editor-row-option">
        <label>Border radius</label>
        <input type="text" wcpt-model-key="border-radius">
      </div>

      <!-- background-color -->
      <div class="wcpt-editor-row-option">
        <label>Background color</label>
        <input type="text" wcpt-model-key="background-color" />
      </div>

      <!-- padding -->
      <div class="wcpt-editor-row-option">
        <label>Padding</label>
        <input type="text" wcpt-model-key="padding-top" placeholder="top">
        <input type="text" wcpt-model-key="padding-right" placeholder="right">
        <input type="text" wcpt-model-key="padding-bottom" placeholder="bottom">
        <input type="text" wcpt-model-key="padding-left" placeholder="left">
      </div>

    </div>
  </div>
</div>

<div class="wcpt-editor-row-option">
  <label>HTML Class</label>
  <input type="text" wcpt-model-key="html_class" />
</div>

<!-- condition -->
<?php include ('condition/outer.php'); ?>