<?php

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_action( 'after_setup_theme', 'primary_menu' );
function primary_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}

add_theme_support( 'post-thumbnails' );

function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

if ( ! isset( $content_width ) ) $content_width = 800;


function offset_main_query ( $query ) {
     if ( $query->is_home() && $query->is_main_query() && !$query->is_paged() ) {
         $query->set( 'offset', '1' );
    }
 }
add_action( 'pre_get_posts', 'offset_main_query' );

?>
