<?php

function voices_script_enqueue ( ) {
  wp_enqueue_style ( 'boostrapstyle', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all' );
  wp_enqueue_style ( 'customstyle', get_template_directory_uri() . '/css/voices.css', array(), null, 'all' );
  wp_enqueue_style ( 'customstyle', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,700', array(), null, 'all' );

  wp_enqueue_script ( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true );
  wp_enqueue_script ( 'angular', get_template_directory_uri() . '/js/angular.min.js', array(), null, true );
  wp_enqueue_script ( 'angularsanitize', get_template_directory_uri() . '/js/angular-sanitize.min.js', array(), null, true );
  wp_enqueue_script ( 'customjs', get_template_directory_uri() . '/js/voices.js', array(), null, true );
  wp_enqueue_script ( 'boostrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
}

add_action ( 'wp_enqueue_scripts', 'voices_script_enqueue' );

function voices_theme_setup ( ) {
  add_theme_support ( 'menus' );
  register_nav_menu( 'primary', 'Primary Header Navigation' );
  register_nav_menu( 'secondary', 'Footer Navigation' );

}

add_action ( 'init', 'voices_theme_setup' );

?>
