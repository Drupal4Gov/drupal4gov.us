(function ($, Drupal, window, document) {
    Drupal.behaviors.Drupal4govSlickConfig = {
      attach: function (context, settings) {
        $('.paragraph--type--testimonials .slick-wrapper').slick({
          dots: true,
          infinite: true,
          speed: 100,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
        });
      }
    };
  })(jQuery, Drupal, drupalSettings);