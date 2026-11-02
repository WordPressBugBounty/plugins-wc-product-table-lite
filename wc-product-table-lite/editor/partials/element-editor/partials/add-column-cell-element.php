<?php
if (empty($wcpt_suppress_cell_element_heading)) {
  echo '<h2>Add Element To Cell Template</h2>';
}

$wcpt_cell_element_types = apply_filters(
  'wcpt_add_column_cell_element_array',
  array(
      'Title',
      'Product Image',
      'Price',
      'Rating',
      'Short Description',
      'Content',
      'Variation Content [pro]',
      'Quantity',
      'Button',
      'Add to cart button',
      'Download Button [pro]',
      'Link Button',
      'Remove [pro]',
      'Cart Quantity [pro]',
      'Favorite (addon) [pro]',
      'Custom Field',
      'Attribute',
      'Tags',
      'Taxonomy [pro]',
      'Multi Property Grid [pro]',
      'ToolTip [pro]',
      'Shortcode [pro]',
      'Custom template [pro]',
      'Login to see [pro]',
      'Select Variation [pro]',
      'Cart Form [pro]',
      'Checkbox [pro]',
      'Total [pro]',
      'Gallery [pro]',
      'On Sale [pro]',
      'Availability [pro]',
      'Position Number [pro]',
      'Dimensions [pro]',
      'Audio Player [pro]',
      // 'Video Player [pro]',
      'Author [pro]',
      'Height [pro]',
      'Width [pro]',
      'Length [pro]',
      'Weight [pro]',
      'Stock',
      'SKU',
      'GTIN',
      'Brand',
      'Product ID',
      'Category',
      'Product Link',
      'Date',
      'Line Separator',
      'Stick Separator [pro]',
      'Compare (3rd party) [pro]',
      'Request quote button (3rd party) [pro]',
      'Quick view (3rd party) [pro]',
      'Wholesale price (3rd party) [pro]',
      'Wholesale sale price (3rd party) [pro]',
      'Original price (3rd party) [pro]',
      'Discount table (3rd party) [pro]',
      'Wholesale label (3rd party) [pro]',
      'Text__Col',
      'HTML__Col',
      'Space__Col',
      'Dot__Col',
      'Icon__Col [pro]',
      'Media Image__Col [pro]',
    )
);

if (!empty($wcpt_exclude_cell_elements) && is_array($wcpt_exclude_cell_elements)) {
  $wcpt_cell_element_types = array_values(array_filter(
    $wcpt_cell_element_types,
    function ($element_type) use ($wcpt_exclude_cell_elements) {
      foreach ($wcpt_exclude_cell_elements as $excluded) {
        if (false !== stripos($element_type, $excluded)) {
          return false;
        }
      }
      return true;
    }
  ));
}

wcpt_elm_type_list($wcpt_cell_element_types);

do_action('wcpt_after_add_column_cell_element_buttons');
?>