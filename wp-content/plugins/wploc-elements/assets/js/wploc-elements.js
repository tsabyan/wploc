/**
 * WPLoc Elements JavaScript
 */

(function ($) {
  "use strict";

  /**
   * Initialize custom elements
   */
  var WPLocElements = {
    init: function () {
      this.bindEvents();
    },

    bindEvents: function () {
      // Add smooth scroll for buttons with hash links
      $(document).on("click", '.wploc-button[href^="#"]', function (e) {
        var target = $(this.hash);
        if (target.length) {
          e.preventDefault();
          $("html, body").animate(
            {
              scrollTop: target.offset().top - 100,
            },
            800
          );
        }
      });

      // Add animation on scroll for cards
      if (window.IntersectionObserver) {
        var cardObserver = new IntersectionObserver(
          function (entries) {
            entries.forEach(function (entry) {
              if (entry.isIntersecting) {
                entry.target.classList.add("animated");
              }
            });
          },
          {
            threshold: 0.1,
          }
        );

        document.querySelectorAll(".wploc-card").forEach(function (card) {
          cardObserver.observe(card);
        });
      }
    },
  };

  // Initialize on document ready
  $(document).ready(function () {
    WPLocElements.init();
  });

  // Re-initialize on Elementor preview load
  $(window).on("elementor/frontend/init", function () {
    WPLocElements.init();
  });
})(jQuery);
