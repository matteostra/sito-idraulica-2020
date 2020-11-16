<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
  $parenthandle = 'chaplin-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
  $theme = wp_get_theme();
  wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
      array(),  // if the parent theme code has a dependency, copy it to here
      $theme->parent()->get('Version')
  );
  wp_enqueue_style( 'chaplin-child', get_stylesheet_uri(),
      array( $parenthandle ),
      $theme->get('Version') // this only works if you have Version in the style header
  );
}

function chaplinchild_theme_support(){

add_theme_support( 'post-thumbnails', array( 'post' ) );}

add_action('after_setup_theme','chaplinchild_theme_support' );
