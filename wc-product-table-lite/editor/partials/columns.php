<div class="wcpt-column-settings wcpt-toggle-column-expand" wcpt-controller="column_settings" wcpt-model-key="[]"
  wcpt-model-key-index="0" wcpt-row-template="column_settings_<?php echo $device; ?>"
  wcpt-initial-data="column_settings">

  <!-- <div class="wcpt-column-toggle-capture"></div> -->

  <?php ob_start(); ?>
  <i class="wcpt-editor-row-expand" wcpt-expand title="Expand">
    <?php wcpt_icon('maximize-2'); ?>
  </i>
  <i class="wcpt-editor-row-contract" wcpt-expand title="Contract">
    <?php wcpt_icon('minimize-2'); ?>
  </i>
  <?php wcpt_corner_options(array('prepend' => ob_get_clean())); ?>

  <!-- column settings index -->
  <span class="wcpt-column-settings__index">Laptop column #1/5</span>

  <!-- column index -->
  <div class="wcpt-column-setttings__top-left">
    <span class="wcpt-column-name-label">Column name</span>
    <input type="text" class="wcpt-column-name-input"
      placeholder="Column # - reference name for this column in the editor" autocomplete="off" wcpt-model-key="name" />

    <span class="wcpt-tooltip" style="position: absolute; right: 5px;" data-wcpt-direction="bottom">
      <span class="wcpt-tooltip-icon"><?php wcpt_icon('help-circle'); ?></span>
      <span class="wcpt-tooltip-content">Create a reference name for the column in the editor. The column
        buttons above will use the same name that you enter here.</span>
    </span>
  </div>
  <!-- heading -->
  <div class="wcpt-tabs" wcpt-model-key="heading" style="margin-bottom: 20px;">
    <div class="wcpt-tab-triggers">
      <div class="wcpt-tab-trigger wcpt-tab-trigger--heading-content">
        <?php wcpt_icon('file-text'); ?>
        Column heading
      </div>
      <div class="wcpt-tab-trigger wcpt-tab-trigger--heading-style">
        <?php wcpt_icon('paint-brush'); ?>
        Style
      </div>
      <span class="wcpt-tooltip" data-wcpt-direction="bottom" style="margin-left: 5px;">
        <span class="wcpt-tooltip-icon"><?php wcpt_icon('help-circle'); ?></span>
        <span class="wcpt-tooltip-content">Use the '+ Add element' button below to add 'Text', 'Sorting' or 'Tooltip'
          elements in the column heading.</span>
      </span>
    </div>

    <!-- heading editor -->
    <div class="wcpt-tab-content wcpt-tab-content--heading-content">
      <div class="wcpt-block-editor wcpt-column-heading-editor" wcpt-model-key="content"></div>
    </div>

    <!-- design options -->
    <div class="wcpt-tab-content wcpt-tab-content--heading-style">
      <?php include('element-editor/partials/column-heading-style.php'); ?>
    </div>

  </div>

  <!-- template -->
  <div class="wcpt-tabs" wcpt-model-key="cell">
    <div class="wcpt-tab-triggers">
      <div class="wcpt-tab-trigger wcpt-tab-trigger--cell-content">
        <?php wcpt_icon('file-text'); ?>
        Column cell
      </div>
      <div class="wcpt-tab-trigger wcpt-tab-trigger--cell-style">
        <?php wcpt_icon('paint-brush'); ?>
        Style
      </div>

      <span class="wcpt-tooltip" data-wcpt-direction="bottom" style="margin-left: 5px;">
        <span class="wcpt-tooltip-icon"><?php wcpt_icon('help-circle'); ?></span>
        <span class="wcpt-tooltip-content">Use the '+ Add element' button below to add product property and other
          elements to the column cells.</span>
      </span>
    </div>

    <!-- template editor -->
    <div class="wcpt-tab-content wcpt-tab-content--cell-content">
      <div class="wcpt-block-editor wcpt-column-template-editor" wcpt-model-key="template"></div>
    </div>

    <!-- design options -->
    <div class="wcpt-tab-content wcpt-tab-content--cell-style">
      <?php include('element-editor/partials/column-cell-style.php'); ?>
    </div>

  </div>

</div>

<button class="wcpt-button" wcpt-add-row-template="column_settings_<?php echo $device; ?>">
  <span>+ Add a <?php echo $device; ?> column</span>
</button>