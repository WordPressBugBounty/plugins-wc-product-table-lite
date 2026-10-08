<?php
$admin_url = admin_url('edit.php?post_type=product&page=product_attributes');
$attribute_slugs_message = 'Enter <a href="' . esc_url($admin_url) . '" target="_blank">global attribute</a> slugs, one per line.';

if (!function_exists('wcpt_attribute_selector_bridge_markup')) {
  /**
   * Markup for the React attribute selector + hidden legacy textarea.
   *
   * @param string $model_key Textarea / model key.
   * @param array  $props     React app props (label, placeholder, etc).
   */
  function wcpt_attribute_selector_bridge_markup($model_key, $props = array())
  {
    $props = array_merge(
      array(
        'placeholder' => 'Search attributes',
        'noAttributesMessage' => 'No global attributes found',
        'textareaModelKey' => $model_key,
      ),
      $props
    );
    ?>
    <div class="wcpt-sortable-attribute-selector" data-wcpt-attribute-selector-bridge
      data-wcpt-react-app-props='<?php echo esc_attr(wp_json_encode($props)); ?>'></div>
    <textarea wcpt-model-key="<?php echo esc_attr($model_key); ?>" class="wcpt-sortable-attribute-selector__textarea"
      style="display:none;" aria-hidden="true"></textarea>
    <?php
  }
}
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
    Auto selection
  </label>
  <label>
    <input type="radio" wcpt-model-key="attribute_source" value="custom">
    Custom selection
  </label>
</div>

<!-- custom attribute selection -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source"
  wcpt-condition-val="custom">
  <?php
  wcpt_attribute_selector_bridge_markup('pre_selected_attribute_slugs', array(
    'label' => 'Select global attributes to generate columns',
    'placeholder' => 'Enter global attribute names',
  ));
  ?>
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
  <?php
  wcpt_attribute_selector_bridge_markup('exclude_attributes', array(
    'label' => 'Exclude attributes',
    'placeholder' => 'Search attributes to exclude',
  ));
  ?>
</div>

<!-- attribute order (Custom source only — drag order comes from the selector above) -->
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="attribute_source"
  wcpt-condition-val="custom">
  <label>
    Select attribute column order
  </label>
  <label>
    <input type="radio" wcpt-model-key="attribute_order" value="alphabetic">
    Alphabetic
  </label>
  <?php
  ob_start();
  echo 'Custom order ';
  wcpt_editor_tooltip('Uses the drag order of attributes selected above.');
  wcpt_pro_radio('custom', ob_get_clean(), 'attribute_order');
  ?>
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
      Note: This option requires that you added a matching attribute filter in the table navigation.
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
<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="separate_lines"
  wcpt-condition-val="false">
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
    Exclude attribute terms
    <small>Enter one attribute term slug per line</small>
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
    </label>
    <?php
    wcpt_attribute_selector_bridge_markup('numerical_sorting_attributes', array(
      'label' => '',
      'placeholder' => 'Enter attribute names',
    ));
    ?>
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
          target="_blank">global woocommerce attributes</a> only, not custom attributes.
      </small>
    </label>
  </div>

</div>