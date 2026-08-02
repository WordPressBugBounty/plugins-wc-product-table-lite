<a href="https://wcproducttable.com/documentation/select-variation/" target="_blank" class="wcpt-how-to-use">
  <?php wcpt_icon('file-text'); ?>
  <span>How to use</span>
</a>

<div class="wcpt-editor-row-option">
  <label>
    Display mode for variation selector
  </label>
  <label>
    <input type="radio" wcpt-model-key="display_type" value="attribute_dropdowns">
    Show separate variation attribute dropdowns
    <small>Same as the variation dropdowns on the product page</small>
  </label>
  <label>
    <input type="radio" wcpt-model-key="display_type" value="dropdown">
    Show single dropdown with variations as options
    <small>Each option in the dropdown is a unique variation with all its attributes listed</small>
  </label>
  <label>
    <input type="radio" wcpt-model-key="display_type" value="radio_multiple">
    Show each variation separately as a radio button
    <small>Each radio button is a unique variation with all its attributes listed</small>
  </label>
  <label>
    <input type="radio" wcpt-model-key="display_type" value="radio_single">
    Show radio button selector for a specific variation only
    <small>You can select the attributes here to specify the variation</small>
  </label>
</div>

<!-- single radio options -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="dropdown||radio_multiple">

  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="hide_attributes">
      Hide attribute name from variation options
      <small>
        Eg: "Size: Large, Gluten: Gluten free" becomes "Large, Gluten free"
      </small>
    </label>
  </div>

  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="hide_attributes"
    wcpt-condition-val="false">
    <label>
      Separator between each attribute and it's term
      <small>
        A character to show separation between the attribute and the term. Eg: : - &mdash;
      </small>
    </label>
    <input type="text" wcpt-model-key="attribute_term_separator">
  </div>

  <div class="wcpt-editor-row-option">
    <label>
      Separator between different attributes
      <small>
        A character to show separation between the attributes. Eg: , | & ::
      </small>
    </label>
    <input type="text" wcpt-model-key="attribute_separator">
  </div>

</div>

<!-- dropdown options -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="dropdown">

  <!-- hide select -->
  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="hide_select" />
      Hide the 'Select' option if default varaition is available
    </label>
  </div>

  <!-- select label -->
  <div class="wcpt-editor-row-option">
    <label>
      Label for the 'Select' option
      <small>
        Appears when no default variation is selected
      </small>
    </label>
    <input type="text" wcpt-model-key="select_label">
  </div>

</div>

<!-- radio options -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="radio_multiple">
  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="separate_lines" />
      Show only one option per line
    </label>
  </div>
</div>

<!-- radio & dropdown options -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="radio_multiple||dropdown">

  <!-- hide stock -->
  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="hide_stock" />
      Hide variation stock from options
    </label>
  </div>

  <!-- hide price -->
  <div class="wcpt-editor-row-option">
    <label>
      <input type="checkbox" wcpt-model-key="hide_price" />
      Hide variation price from options
    </label>
  </div>

</div>

<!-- non-variable template (dropdown, radio multiple, attribute dropdowns) -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="radio_multiple||dropdown||attribute_dropdowns">

  <!-- template for non-variable -->
  <div class="wcpt-editor-row-option">
    <label>
      Output template when product is not variable
    </label>
    <div wcpt-model-key="non_variable_template" wcpt-block-editor="" wcpt-be-add-row=""
      wcpt-be-add-element-partial="add-column-cell-element"></div>
  </div>

</div>

<!-- single radio options -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="radio_single">

  <div class="wcpt-editor-row-option">
    <label>
      Label for this variation
      <small>This label will be shown to the user with radio button</small>
    </label>
    <input type="text" wcpt-model-key="variation_name" />
  </div>

  <div class="wcpt-editor-row-option" wcpt-model-key="attribute_terms">

    <label>
      Specify all attribute-terms of this variation
      <small>This list will help WCPT identify the variation</small>
    </label>

    <div class="wcpt-editor-row wcpt-editor-select-variation-attribute-term" wcpt-controller="taxonomy_terms"
      wcpt-model-key="[]" wcpt-model-key-index="0" wcpt-row-template="identify_variation">
      <select wcpt-model-key="taxonomy">
        <option value="">Attribute</option>
        <?php
        foreach ($attributes as $attribute) {
          echo '<option value="pa_' . $attribute->attribute_name . '">' . $attribute->attribute_label . '</option>';
        }
        ?>
      </select>
      <select wcpt-model-key="term">
        <option value="">Term</option>
      </select>
      <span class="wcpt-loading-term" style="display: none;"><?php wcpt_icon('loader', 'wcpt-rotate'); ?>
        Loading...</span>
      <span class="wcpt-remove-item" wcpt-remove-row title="Delete row"><?php wcpt_icon('x') ?></span>
    </div>

    <button class="wcpt-button" wcpt-add-row-template="identify_variation">
      Add another
    </button>

  </div>

  <div class="wcpt-editor-row-option">
    <label>
      Template
      <small>Placeholder: [variation_name]</small>
    </label>
    <div wcpt-block-editor="" wcpt-be-add-element-partial="add-variation-element" wcpt-be-add-row="1"
      wcpt-model-key="template"></div>
  </div>

  <div class="wcpt-editor-row-option">
    <label>
      Output if this variation does not exist for the product
      <small>Leave empty for no output</small>
    </label>
    <div wcpt-block-editor="" wcpt-be-add-element-partial="add-common-element" wcpt-be-add-row="1"
      wcpt-model-key="not_exist_template"></div>
  </div>

  <!-- radio single style -->
  <div class="wcpt-editor-row-option" wcpt-model-key="style">

    <div class="wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id]">

      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for Container
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <?php require('style/common-props.php'); ?>

    </div>

    <!-- style: out of stock -->
    <div class="wcpt-editor-row-option">
      <div class="wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id].wcpt-variation-out-of-stock">

        <span class="wcpt-toggle-label">
          <?php echo wcpt_icon('paint-brush'); ?>
          Style when variation is 'Out of Stock'
          <?php echo wcpt_icon('chevron-down'); ?>
        </span>

        <?php require('style/common-props.php'); ?>

      </div>
    </div>

    <!-- style: checked -->
    <div class="wcpt-editor-row-option">
      <div class="wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id].wcpt-selected">

        <span class="wcpt-toggle-label">
          <?php echo wcpt_icon('paint-brush'); ?>
          Style when variation is 'Selected'
          <?php echo wcpt_icon('chevron-down'); ?>
        </span>

        <?php require('style/common-props.php'); ?>

      </div>
    </div>

  </div>

</div> <!-- /single radio options -->

<div class="wcpt-editor-row-option">
  <label>HTML class for container</label>
  <input type="text" wcpt-model-key="html_class" />
</div>


<!-- dropdown style -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="dropdown">
  <div class="wcpt-editor-row-option" wcpt-model-key="style">
    <div class="wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id] > .wcpt-select-variation-dropdown">
      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for Dropdown
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <!-- font-size -->
      <div class="wcpt-editor-row-option">
        <label>Font size</label>
        <input type="text" wcpt-model-key="font-size" />
      </div>

      <!-- line-height -->
      <div class="wcpt-editor-row-option">
        <label>Line height</label>
        <input type="text" wcpt-model-key="line-height" placeholder="1.2em">
      </div>

      <!-- width -->
      <div class="wcpt-editor-row-option">
        <label>Width</label>
        <input type="text" wcpt-model-key="width" />
      </div>

      <!-- width -->
      <div class="wcpt-editor-row-option">
        <label>Max width</label>
        <input type="text" wcpt-model-key="max-width" placeholder="200px" />
      </div>

      <!-- height -->
      <div class="wcpt-editor-row-option">
        <label>Height</label>
        <input type="text" wcpt-model-key="height" />
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

      <!-- margin -->
      <div class="wcpt-editor-row-option">
        <label>Margin</label>
        <div class="wcpt-flex-option-container">
          <input type="text" wcpt-model-key="margin-top" placeholder="top">
          <input type="text" wcpt-model-key="margin-right" placeholder="right">
          <input type="text" wcpt-model-key="margin-bottom" placeholder="bottom">
          <input type="text" wcpt-model-key="margin-left" placeholder="left">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- attribute dropdowns style -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="attribute_dropdowns">
  <div class="wcpt-editor-row-option" wcpt-model-key="style">
    <div class="wcpt-toggle-options wcpt-row-accordion">
      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for Attribute Dropdowns
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <!-- direction -->
      <div class="wcpt-editor-row-option" wcpt-model-key="[id] .variations">
        <label>Layout direction</label>
        <select wcpt-model-key="flex-direction">
          <option value="">Auto</option>
          <option value="row">Horizontal</option>
          <option value="column">Vertical</option>
        </select>
      </div>

      <!-- select element -->
      <div wcpt-model-key="[id] .wcpt-variation-attribute-dropdown-wrapper select">
        <!-- font-size -->
        <div class="wcpt-editor-row-option">
          <label>Font size</label>
          <input type="text" wcpt-model-key="font-size" />
        </div>

        <!-- width -->
        <div class="wcpt-editor-row-option">
          <label>Width</label>
          <input type="text" wcpt-model-key="width" />
        </div>

        <!-- max-width -->
        <div class="wcpt-editor-row-option">
          <label>Max width</label>
          <input type="text" wcpt-model-key="max-width" placeholder="200px" />
        </div>

        <!-- height -->
        <div class="wcpt-editor-row-option">
          <label>Height</label>
          <input type="text" wcpt-model-key="height" />
        </div>

        <!-- background color -->
        <div class="wcpt-editor-row-option">
          <label>Background color</label>
          <input type="text" wcpt-model-key="background-color" class="wcpt-color-picker">
        </div>

        <!-- background color on hover -->
        <div class="wcpt-editor-row-option">
          <label>↳ on hover</label>
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
          <label>↳ color on hover</label>
          <input type="text" wcpt-model-key="border-color:hover" class="wcpt-color-picker" placeholder="color">
        </div>

        <!-- border-radius -->
        <div class="wcpt-editor-row-option">
          <label>Border radius</label>
          <input type="text" wcpt-model-key="border-radius">
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
  </div>
</div>


<!-- radio multiple style -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="display_type"
  wcpt-condition-val="radio_multiple">
  <div wcpt-model-key="style">
    <div class="wcpt-editor-row-option">

      <div class="wcpt-toggle-options wcpt-row-accordion"
        wcpt-model-key="[id].wcpt-select-varaition-radio-multiple-wrapper">
        <span class="wcpt-toggle-label">
          <?php echo wcpt_icon('paint-brush'); ?>
          Style for Container
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

        <!-- line-height -->
        <div class="wcpt-editor-row-option">
          <label>Line height</label>
          <input type="text" wcpt-model-key="line-height" placeholder="1.2em">
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

        <!-- margin -->
        <div class="wcpt-editor-row-option">
          <label>Margin</label>
          <div class="wcpt-flex-option-container">
            <input type="text" wcpt-model-key="margin-top" placeholder="top">
            <input type="text" wcpt-model-key="margin-right" placeholder="right">
            <input type="text" wcpt-model-key="margin-bottom" placeholder="bottom">
            <input type="text" wcpt-model-key="margin-left" placeholder="left">
          </div>
        </div>
      </div>
    </div>

    <div class="wcpt-editor-row-option">
      <div class="wcpt-toggle-options wcpt-row-accordion"
        wcpt-model-key="[id].wcpt-select-varaition-radio-multiple-wrapper .wcpt-select-variation">
        <span class="wcpt-toggle-label">
          <?php echo wcpt_icon('paint-brush'); ?>
          Style for Option
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

        <!-- line-height -->
        <div class="wcpt-editor-row-option">
          <label>Line height</label>
          <input type="text" wcpt-model-key="line-height" placeholder="1.2em">
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

        <!-- margin -->
        <div class="wcpt-editor-row-option">
          <label>Margin</label>
          <div class="wcpt-flex-option-container">
            <input type="text" wcpt-model-key="margin-top" placeholder="top">
            <input type="text" wcpt-model-key="margin-right" placeholder="right">
            <input type="text" wcpt-model-key="margin-bottom" placeholder="bottom">
            <input type="text" wcpt-model-key="margin-left" placeholder="left">
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<!-- condition -->
<?php include('condition/outer.php'); ?>