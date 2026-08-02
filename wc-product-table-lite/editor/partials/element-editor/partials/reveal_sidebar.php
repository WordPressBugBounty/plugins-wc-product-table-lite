<div class="wcpt-editor-row-option">
  <label>Button label</label>
  <div wcpt-model-key="label" wcpt-block-editor wcpt-be-add-row="0"></div>
</div>

<div class="wcpt-editor-row-option">
  <label>HTML Class</label>
  <input type="text" wcpt-model-key="html_class">
</div>

<div class="wcpt-editor-row-option" wcpt-model-key="style">
  <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id]">
    <span class="wcpt-toggle-label">
      <?php echo wcpt_icon('paint-brush'); ?>
      Style for Reveal Sidebar button
      <?php echo wcpt_icon('chevron-down'); ?>
    </span>

    <?php require('style/common-props.php'); ?>
  </div>
</div>
