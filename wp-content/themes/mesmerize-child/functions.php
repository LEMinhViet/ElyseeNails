<?php
  add_action( 'wp_enqueue_scripts', 'mesmerize_enqueue_styles' );
  function mesmerize_enqueue_styles() {
    $parent_style = 'mesmerize-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
  }


  function change_footer_copyright_text($copyright) {
    $copyrightText = __('Le site utilise WordPress et Mesmerize.<br>L\'équipe Elysées Nails Paris');

    return $copyrightText;
  }

  add_filter('mesmerize_get_footer_copyright', 'change_footer_copyright_text');

  add_action('wp_footer', "remove_mesmerize_header_slideshow_script", 1);
  function remove_mesmerize_header_slideshow_script() {
    remove_action('wp_footer', "mesmerize_header_slideshow_script");
    add_action('wp_footer', "mesmerize_child_header_slideshow_script");
  }

  function mesmerize_child_header_slideshow_script()
  {
      $prefix = "header";

      $textDomain = mesmerize_get_text_domain();

      $bgSlideshow = get_theme_mod($prefix . "_slideshow", array(
          array("url" => get_template_directory_uri() . "/assets/images/slideshow_slide1.jpg"),
          array("url" => get_template_directory_uri() . "/assets/images/slideshow_slide2.jpg"),
      ));

      $images = array();
      foreach ($bgSlideshow as $key => $value) {
          if (is_numeric($value['url'])) {
              array_push($images, esc_url_raw(wp_get_attachment_url($value['url'])));
          } else {
              array_push($images, esc_url_raw($value['url']));
          }
      }

      $bgSlideshowSpeed    = intval(get_theme_mod($prefix . "_slideshow_speed", '1000'));
      $bgSlideshowDuration = intval(get_theme_mod($prefix . "_slideshow_duration", '5000'));

      $mesmerize_jssettings = array(
          'images'             => $images,
          'duration'           => intval($bgSlideshowDuration),
          'transition'         => 'cover_left',
          'transitionDuration' => intval($bgSlideshowSpeed),
          'animateFirst'       => false,
      );

      wp_localize_script($textDomain . '-backstretch', 'mesmerize_backstretch', $mesmerize_jssettings);
  }
?>