<div class="wcpt-toggle-options" wcpt-model-key="manage_scripts" data-wcpt-anchor="manage_scripts">
  <div class="wcpt-editor-light-heading wcpt-toggle-label">
    Manage plugin scripts
    <?php echo wcpt_icon('chevron-down'); ?>
  </div>

  <div class="wcpt-editor-row-option">
    <label>Choose pages where plugin scripts and styles are loaded</label>
    <label><input type="radio" wcpt-model-key="mode" value="do_nothing"> Do nothing (load on all pages)</label>
    <label><input type="radio" wcpt-model-key="mode" value="include"> Only load on specific pages</label>
    <label><input type="radio" wcpt-model-key="mode" value="exclude"> Remove from specific pages</label>
  </div>

  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="mode"
    wcpt-condition-val="include">
    <label>
      Load on these relative URLs / patterns
      <small>
        1. Enter only one relative URL per line</br>
        2. URLs should be relative to "<?php echo site_url() . '/'; ?>", eg: shop</br>
        3. Add "*" to end of path to mass match, eg: shop/*</br>
        4. Enter just "/" to refer to home page</br>
        5. Scripts will only load on matching pages
      </small>
    </label>
    <textarea wcpt-model-key="include_urls" placeholder="eg: shop&#10;product-category/*"></textarea>
  </div>

  <div class="wcpt-editor-row-option" wcpt-panel-condition="prop" wcpt-condition-prop="mode"
    wcpt-condition-val="exclude">
    <label>
      Remove on these relative URLs / patterns
      <small>
        1. Enter only one relative URL per line</br>
        2. URLs should be relative to "<?php echo site_url() . '/'; ?>", eg: about-us/team</br>
        3. Add "*" to end of path to mass match, eg: blog/*</br>
        4. Enter just "/" to refer to home page</br>
        5. Do not include pages that display a product table
      </small>
    </label>
    <textarea wcpt-model-key="exclude_urls" placeholder="eg: cart&#10;checkout&#10;my-account/*"></textarea>
  </div>

</div>