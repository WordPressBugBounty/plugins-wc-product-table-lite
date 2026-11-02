<h2>Add logged-in element</h2>
<?php
$wcpt_suppress_cell_element_heading = true;
$wcpt_exclude_cell_elements = array('Login to see');
include __DIR__ . '/add-column-cell-element.php';
unset($wcpt_suppress_cell_element_heading, $wcpt_exclude_cell_elements);
?>
