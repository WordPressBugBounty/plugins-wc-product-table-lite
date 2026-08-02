<?php
$admin_url = admin_url('edit.php?post_type=product&page=product_attributes');
$attribute_slugs_message = 'Enter <a href="' . esc_url($admin_url) . '" target="_blank">global attribute</a> slugs, one per line.';
?>

<!-- attribute columns -->
<div class="wcpt-editor-row-option">
  <label style="padding-top: 0">
    <span style="font-weight: bold;">Auto-generate attribute columns</span>
    <?php wcpt_editor_tooltip('This is a special column type that you can use to automatically generate multiple attribute columns in the table. Only works with global woocommerce attributes.'); ?>
  </label>
  <hr style="border-bottom: 1px solid #ddd;
        border-top: none;
        background: none;
        margin: 10px 0 0;
        padding: 0;" />
</div>

<!-- attribute source -->
<div class="wcpt-editor-row-option">
  <label>
    Select attributes to generate columns
  </label>
  <label>
    <input type="radio" wcpt-model-key="attribute_source" value="auto">
    Auto – Global attributes (up to max columns)
  </label>

  <label>
    <input type="radio" wcpt-model-key="attribute_source" value="custom">
    Custom – Select a specific set of attributes
  </label>
  <label><small wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source"
      wcpt-condition-val="custom"><?php echo $attribute_slugs_message; ?></small></label>
  <textarea wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source" wcpt-condition-val="custom"
    wcpt-model-key="pre_selected_attribute_slugs"></textarea>

</div>

<!-- max attribute columns (Auto only) -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source"
  wcpt-condition-val="auto">
  <label>
    Maximum number of attribute columns to generate
  </label>
  <input type="number" wcpt-model-key="max_columns" min="1" max="20" placeholder="default: 3"
    data-wcpt-diw-disabled="true">
</div>

<!-- exclude attributes (Auto only) -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source"
  wcpt-condition-val="auto">
  <label>
    Exclude attributes by slug <small><?php echo $attribute_slugs_message; ?></small>
  </label>
  <textarea wcpt-model-key="exclude_attributes"></textarea>
</div>

<!-- attribute order -->
<div class="wcpt-editor-row-option">
  <label>
    Select attribute column order
  </label>
  <label>
    <input type="radio" wcpt-model-key="attribute_order" value="alphabetic">
    Alphabetic
  </label>
  <?php wcpt_pro_radio('custom', 'Custom order', 'attribute_order'); ?>
  <div wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source" wcpt-condition-val="auto">
    <label><small wcpt-panel-condition="prop" wcpt-condition-prop="attribute_order"
        wcpt-condition-val="custom"><?php echo $attribute_slugs_message; ?></small></label>
    <div wcpt-panel-condition="prop" wcpt-condition-prop="attribute_order" wcpt-condition-val="custom">
      <textarea wcpt-model-key="ordered_attribute_slugs"></textarea>
    </div>
  </div>
  <label wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source" wcpt-condition-val="custom">
    <small wcpt-panel-condition="prop" wcpt-condition-prop="attribute_order" wcpt-condition-val="custom">
      Note: Uses the order of attributes entered in the custom list above.
    </small>
  </label>

</div>

<!-- link term to filter -->
<div class="wcpt-editor-row-option">
  <label>
    Action when clicking an attribute terms
  </label>
  <label><input type="radio" wcpt-model-key="click_action" value="">Do nothing</label>
  <?php wcpt_pro_radio('archive_redirect', 'Go to archive page', 'click_action'); ?>
  <?php wcpt_pro_radio('trigger_filter', 'Trigger matching filter', 'click_action'); ?>
  <label wcpt-panel-condition="prop" wcpt-condition-prop="click_action" wcpt-condition-val="trigger_filter">
    <small>
      Note: This option requires that you have the corresponding navigation filter element set up in your table's
      navigation section.
    </small>
  </label>
</div>

<!-- terms in separate lines -->
<div class="wcpt-editor-row-option">
  <label>
    <input type="checkbox" wcpt-model-key="separate_lines">
    Show multiple terms in separate lines
  </label>
</div>

<!-- term separator -->
<div class="wcpt-editor-row-option">
  <label>Separator between attribute terms</label>
  <div wcpt-model-key="separator" class="wcpt-separator-editor" wcpt-block-editor="" wcpt-be-add-row="0"></div>
</div>

<!-- empty value relabel -->
<div class="wcpt-editor-row-option">
  <label>Output when no attribute terms are found</label>
  <div wcpt-model-key="empty_relabel" wcpt-block-editor="" wcpt-be-add-row="0"></div>
</div>

<!-- exclude terms -->
<div class="wcpt-editor-row-option">
  <label>
    Exclude terms by slug
    <small><?php echo $attribute_slugs_message; ?></small>
  </label>
  <textarea wcpt-model-key="exclude_terms"></textarea>
</div>

<!-- enable headings -->
<div class="wcpt-editor-row-option">
  <label>
    <input type="checkbox" wcpt-model-key="heading_enabled">
    Show column heading with attribute name
  </label>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="heading_enabled"
  wcpt-condition-val="true">
  <!-- enable sort by attribute headings -->
  <div class="wcpt-editor-row-option">
    <?php wcpt_pro_checkbox('true', 'Sort products by attribute when the column heading is clicked', 'sort_by_column_heading_enabled'); ?>
  </div>

  <!-- numerical sorting attributes -->
  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="sort_by_column_heading_enabled"
    wcpt-condition-val="true">
    <label>
      Attributes that require numerical sorting
      <?php wcpt_editor_tooltip('To enable numerical sorting, attribute terms must either be numbers or begin with a number, such as \'20 kg\' or \'10 mm\'. Terms starting with words, like \'kg 20\' or \'mm 10\', will not be sorted numerically.'); ?>

      <small>
        <?php echo $attribute_slugs_message; ?>
      </small>
    </label>
    <textarea wcpt-model-key="numerical_sorting_attributes"></textarea>
  </div>

  <!-- footer note -->
  <div class="wcpt-editor-row-option">
    <hr style="border-bottom: 1px solid #ddd;
    border-top: none;
    background: none;
    margin: 5px 0 20px;
    padding: 0;" />
    <label>
      <small>
        Note: This auto-attribute column generator facility works with <a
          href="https://woocommerce.com/document/managing-product-taxonomies/#how-to-add-edit-product-attributes"
          target="_blank">global woocommerce attributes</a> only, not custom - product level attributes.
      </small>
    </label>
  </div>

</div>