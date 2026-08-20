(function ($) {
  'use strict';

  if (typeof wcptDeactivationFeedback === 'undefined') {
    return;
  }

  var cfg = wcptDeactivationFeedback;
  var deactivateUrl = null;
  var $modal = $('#wcpt-deactivation-feedback');
  var $form = $('#wcpt-df-form');
  var $submit = $form.find('.wcpt-df__submit');
  var busy = false;

  function findDeactivateLink() {
    var basename = cfg.pluginBasename;
    var slug = cfg.pluginSlug;

    // Prefer the id WordPress adds: deactivate-{slug}
    var $byId = $('#deactivate-' + slug);
    if ($byId.length) {
      return $byId;
    }

    // Fallback: match the plugin query arg in the href.
    return $('a').filter(function () {
      var href = $(this).attr('href') || '';
      return (
        href.indexOf('action=deactivate') !== -1 &&
        (href.indexOf(encodeURIComponent(basename)) !== -1 ||
          href.indexOf(basename) !== -1)
      );
    }).first();
  }

  /**
   * Only follow same-origin admin deactivate URLs (defense in depth).
   */
  function isSafeDeactivateUrl(url) {
    if (!url || typeof url !== 'string') {
      return false;
    }

    // Relative admin paths are fine.
    if (url.charAt(0) === '/' || url.indexOf('?') === 0 || url.indexOf('plugins.php') === 0) {
      return url.indexOf('action=deactivate') !== -1;
    }

    try {
      var parsed = new URL(url, window.location.href);
      if (parsed.origin !== window.location.origin) {
        return false;
      }
      return (
        parsed.pathname.indexOf('plugins.php') !== -1 &&
        parsed.search.indexOf('action=deactivate') !== -1
      );
    } catch (err) {
      return false;
    }
  }

  function openModal(url) {
    if (!isSafeDeactivateUrl(url)) {
      return;
    }
    deactivateUrl = url;
    $form[0].reset();
    busy = false;
    $submit.prop('disabled', false).text(cfg.i18n.submit);
    $modal.removeAttr('hidden').attr('aria-hidden', 'false');
    $('body').addClass('wcpt-df-open');
    $modal.find('input[name="wcpt_df_reason"]').first().trigger('focus');
  }

  function closeModal() {
    $modal.attr('hidden', true).attr('aria-hidden', 'true');
    $('body').removeClass('wcpt-df-open');
  }

  function proceed() {
    if (!deactivateUrl || !isSafeDeactivateUrl(deactivateUrl)) {
      return;
    }
    window.location.href = deactivateUrl;
  }

  function sendFeedback(reason, message, then) {
    $.ajax({
      url: cfg.ajaxUrl,
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'wcpt_deactivation_feedback',
        nonce: cfg.nonce,
        reason: reason || '',
        message: message || ''
      },
      complete: function () {
        then();
      }
    });
  }

  $(function () {
    var $link = findDeactivateLink();
    if (!$link.length || !$modal.length) {
      return;
    }

    $link.on('click', function (e) {
      e.preventDefault();
      openModal($(this).attr('href'));
    });

    $modal.on('click', '[data-wcpt-df-skip]', function (e) {
      e.preventDefault();
      if (busy) {
        return;
      }
      closeModal();
      proceed();
    });

    $form.on('submit', function (e) {
      e.preventDefault();
      if (busy) {
        return;
      }

      var reason = ($form.find('input[name="wcpt_df_reason"]:checked').val() || '').trim();
      var message = ($form.find('#wcpt-df-message').val() || '').trim();

      // No selection and no message — treat as skip.
      if (!reason && !message) {
        closeModal();
        proceed();
        return;
      }

      busy = true;
      $submit.prop('disabled', true).text(cfg.i18n.submitting);

      sendFeedback(reason, message, function () {
        closeModal();
        proceed();
      });
    });

    $(document).on('keydown', function (e) {
      if (e.key === 'Escape' && !$modal.attr('hidden')) {
        e.preventDefault();
        closeModal();
        proceed();
      }
    });
  });
})(jQuery);
