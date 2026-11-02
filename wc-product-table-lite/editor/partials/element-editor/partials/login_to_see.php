<div class="wcpt-editor-row-option">
  <label>
    Logged-out visitors
  </label>
  <label>
    <small>
      Shown when the visitor is logged out.
    </small>
  </label>
  <div wcpt-block-editor="" wcpt-be-add-element-partial="add-login-to-see-guest-element" wcpt-be-add-row="1"
    wcpt-model-key="logged_out" wcpt-be-edit-row="cell-row"></div>
</div>

<div class="wcpt-editor-row-option">
  <label>
    <input type="checkbox" wcpt-model-key="link_guest_message" />
    Link this message to the login page
  </label>
  <label>
    <small>
      Uses the WooCommerce My Account page when that page exists, otherwise the WordPress login page, and sends the
      visitor back to this page. Turn this off when the logged-out message already contains its own link.
    </small>
  </label>
</div>

<div class="wcpt-editor-row-option">
  <label>
    <input type="checkbox" wcpt-model-key="limit_by_role" />
    Select which roles qualify as logged in
  </label>
  <label>
    <small>
      Leave this off to treat every logged-in visitor as logged in. Guests always see the logged-out message.
    </small>
  </label>
</div>

<div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="limit_by_role"
  wcpt-condition-val="true">
  <div class="wcpt-checkbox-selection-group">
    <label>Roles that qualify as logged in</label>
    <?php
    foreach (wp_roles()->get_names() as $role => $label) {
      ?>
      <label class="wcpt-editor-checkbox-label">
        <input type="checkbox" wcpt-controller="checkbox_selection" wcpt-model-key="qualified_roles[]"
          value="<?php echo esc_attr(strtolower($role)); ?>">
        <?php echo esc_html($label); ?>
      </label>
      <?php
    }
    ?>
  </div>
</div>

<div class="wcpt-editor-row-option">
  <label>
    Logged-in visitors
  </label>
  <label>
    <small>
      Shown to visitors who qualify as logged in. An empty slot shows nothing, so they never see the login prompt.
    </small>
  </label>
  <div wcpt-block-editor="" wcpt-be-add-element-partial="add-login-to-see-logged-in-element" wcpt-be-add-row="1"
    wcpt-model-key="logged_in" wcpt-be-edit-row="cell-row"></div>
</div>

<div class="wcpt-editor-row-option">
  <label>HTML Class</label>
  <input type="text" wcpt-model-key="html_class" />
</div>

<div class="wcpt-editor-row-option" wcpt-model-key="style">

  <div class="wcpt-editor-row-option">
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion"
      wcpt-model-key="[id] .wcpt-login-to-see__guest">

      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for 'Logged-out' message
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <?php require('style/common-props.php'); ?>
    </div>
  </div>

  <div class="wcpt-editor-row-option">
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion"
      wcpt-model-key="[id] .wcpt-login-to-see__logged-in">

      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for 'Logged-in' message
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <?php require('style/common-props.php'); ?>

    </div>
  </div>
  <div class="wcpt-editor-row-option">
    <div class="wcpt-editor-row-option wcpt-toggle-options wcpt-row-accordion" wcpt-model-key="[id]">

      <span class="wcpt-toggle-label">
        <?php echo wcpt_icon('paint-brush'); ?>
        Style for Container
        <?php echo wcpt_icon('chevron-down'); ?>
      </span>

      <?php require('style/common-props.php'); ?>

    </div>
  </div>

</div>

<?php include('condition/outer.php'); ?>