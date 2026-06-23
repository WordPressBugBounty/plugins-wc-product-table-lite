(function ($) {
  "use strict";

  var WCPT_PANEL_ID = "wcpt_panel";

  function isWcptSection(section) {
    return section.panel && section.panel() === WCPT_PANEL_ID;
  }

  function initColorPicker($input) {
    if ($input.data("wcpt-spectrum-init")) {
      return;
    }

    $input.data("wcpt-spectrum-init", true);

    $input.spectrum({
      color: $input.val(),
      flat: false,
      allowEmpty: true,
      showAlpha: true,
      preferredFormat: "rgb",
      clickoutFiresChange: true,
      showInput: true,
      showButtons: true,
      show: function () {
        $input.spectrum("container").css("z-index", "999999");
      },
      move: function (color) {
        if (color) {
          $input.val(color.toRgbString()).trigger("change");
        } else {
          $input.val("").trigger("change");
        }
      },
      change: function (color) {
        if (color) {
          $input.val(color.toRgbString()).trigger("change");
        } else {
          $input.val("").trigger("change");
        }
      },
      hide: function (color) {
        if (!color) {
          $input.val("").trigger("change");
        }
      },
    });
  }

  function initNumberPicker($input) {
    if ($input.data("wcpt-number-picker-init")) {
      return;
    }

    $input.data("wcpt-number-picker-init", true);

    var $wrapper = $('<div class="wcpt-number-picker-wrapper"></div>');
    var $unitSelect = $('<select class="wcpt-unit-select"></select>');
    var units = ["px", "em", "rem", "%"];

    units.forEach(function (unit) {
      $unitSelect.append(
        $('<option value="' + unit + '">' + unit + "</option>")
      );
    });

    $input.wrap($wrapper);
    $input.after($unitSelect);

    $unitSelect.on("change", function () {
      var value = $input.val();
      var unit = $(this).val();

      value = value.replace(/[a-z%]+$/, "");
      $input.val(value + unit);
      $input.trigger("change");
    });

    var value = $input.val();
    var currentUnit = value.match(/[a-z%]+$/);
    if (currentUnit) {
      $unitSelect.val(currentUnit[0]);
    }
  }

  function initControlsInContainer($container) {
    $container.find(".wcpt-customizer-color-picker").each(function () {
      initColorPicker($(this));
    });

    $container.find(".wcpt-customizer-number-picker").each(function () {
      initNumberPicker($(this));
    });
  }

  function initControlsInSection(section) {
    if (!section || !section.contentContainer) {
      return;
    }

    initControlsInContainer(section.contentContainer);
  }

  function bindSectionLazyInit(section) {
    if (!isWcptSection(section)) {
      return;
    }

    section.expanded.bind(function (expanded) {
      if (expanded) {
        window.requestAnimationFrame(function () {
          initControlsInSection(section);
        });
      }
    });

    if (section.expanded()) {
      window.requestAnimationFrame(function () {
        initControlsInSection(section);
      });
    }
  }

  function bindWcptPanelLazyInit() {
    wp.customize.section.each(bindSectionLazyInit);

    var panel = wp.customize.panel(WCPT_PANEL_ID);
    if (!panel) {
      return;
    }

    panel.expanded.bind(function (expanded) {
      if (!expanded) {
        return;
      }

      wp.customize.section.each(function (section) {
        if (isWcptSection(section) && section.expanded()) {
          window.requestAnimationFrame(function () {
            initControlsInSection(section);
          });
        }
      });
    });
  }

  // Defer WCPT control enhancements until after core Customizer panes finish
  // initializing. Initializing hundreds of Spectrum pickers during "ready"
  // breaks Safari sidebar rendering (controls exist in DOM but stay invisible).
  wp.customize.bind("ready", function () {
    window.requestAnimationFrame(function () {
      bindWcptPanelLazyInit();
    });
  });

  // Handle number-text inputs
  $(document).on("input", ".wcpt-number-text", function () {
    var $input = $(this);
    var value = $input.val();
    var match = value.match(/^(-?\d*\.?\d+)(px|em|rem|%|vh|vw)?$/);

    if (match) {
      $input.data("unit", match[2] || "px");
    }
  });

  // Handle up/down arrow keys
  $(document).on("keydown", ".wcpt-number-text", function (e) {
    var $input = $(this);
    var id = $input.attr("id");
    var value = $input.val();
    var match = value.match(/^(-?\d*\.?\d+)(px|em|rem|%|vh|vw)?$/);

    if (match) {
      var number = parseFloat(match[1]);
      var unit = match[2] || "px";
      var step = unit === "em" ? 0.1 : parseFloat($input.attr("step")) || 1;

      if (e.shiftKey) {
        step *= 10;
      }

      if (e.key === "ArrowUp") {
        e.preventDefault();
        number = Math.round((number + step) * 100) / 100;
        $input.val(number + unit).trigger("change");
      } else if (e.key === "ArrowDown") {
        e.preventDefault();
        number = Math.max(0, Math.round((number - step) * 100) / 100);
        $input.val(number + unit).trigger("change");
      }
    } else if (e.key === "ArrowUp") {
      e.preventDefault();
      if (id.includes("border_width") || id.includes("border_radius")) {
        $input.val("1px").trigger("change");
      } else if (id.includes("search_height")) {
        $input.val("20px").trigger("change");
      } else if (id.includes("search_width")) {
        $input.val("150px").trigger("change");
      } else if (id.includes("font_size")) {
        $input.val("12px").trigger("change");
      } else {
        $input.val("5px").trigger("change");
      }
    }
  });
})(jQuery);
