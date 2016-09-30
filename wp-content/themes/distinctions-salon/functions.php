<?php

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles');
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'grid', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css');
}

function wp_enqueue_scripts() {
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/dist/scripts.min.js', array( 'jquery' ), '1.0', true );
}

?>