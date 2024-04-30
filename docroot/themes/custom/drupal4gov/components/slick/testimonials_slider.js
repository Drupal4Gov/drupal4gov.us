(function ($, Drupal, window, document) {
    Drupal.behaviors.Drupal4govSlickConfig = {
      attach: function (context, settings) {
        $('.paragraph--type--testimonials .field--name-field-testimonial').slick({
          dots: true,
          infinite: true,
          speed: 100,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        });
      }
    };
  })(jQuery, Drupal, drupalSettings);
