jQuery(function ($) {
  $(".wcpt-presets__item__preview").on("click", function (e) {
    e.stopPropagation();
  });

  // reload page with preset slug param
  $(".wcpt-presets__item:not(.wcpt-presets__item--locked)").on("click", function (e) {
    if ($(e.target).closest("a.wcpt-presets__item__preview").length) {
      return;
    }
    var $this = $(this),
      slug = $this.attr("data-wcpt-preset-slug"),
      currentUrl = window.location.href;

    // Check if the URL has a fragment (#)
    var urlParts = currentUrl.split("#");
    var baseUrl = urlParts[0]; // URL without the fragment
    var fragment = urlParts[1] ? "#" + urlParts[1] : ""; // Retain the fragment if it exists

    // Update the URL
    var newUrl = baseUrl + "&wcpt_preset=" + slug + fragment;
    window.location.href = newUrl;
  });
});
