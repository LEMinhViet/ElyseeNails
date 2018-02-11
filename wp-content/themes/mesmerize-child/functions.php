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
    $copyrightText = __('Le site utilise WordPress et Mesmerize');

    return $copyrightText;
  }

  add_filter('mesmerize_get_footer_copyright', 'change_footer_copyright_text');
?>