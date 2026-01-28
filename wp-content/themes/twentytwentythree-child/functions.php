<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_and_child_styles' );
function enqueue_parent_and_child_styles() {
   // Cargar CSS del tema padre
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   // Cargar CSS del child theme
   wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'), wp_get_theme()->get('Version') );
}
add_action(
 'init',
 function () {
  // Remove the Really Simple Discovery service link
  remove_action( 'wp_head', 'rsd_link' );
  // Remove the link to the Windows Live Writer manifest
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // Remove the general feeds
  remove_action( 'wp_head', 'feed_links', 2 );
  // Remove the extra feeds, such as category feeds
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  // Remove the displayed XHTML generator
  remove_action( 'wp_head', 'wp_generator' );
  // Remove the REST API link tag
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
  // Remove oEmbed discovery links
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
  // Remove rel next/prev links
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
  // Remove prefetch url
  remove_action( 'wp_head', 'wp_resource_hints', 2 );
 }
);
