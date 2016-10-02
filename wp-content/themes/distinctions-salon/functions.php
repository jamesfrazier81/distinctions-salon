<?php
function wpdocs_theme_name_scripts() {
    // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/dist/scripts.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//Menu registration
function my_wp_nav_menu_args( $args = '' ) {

if( is_user_logged_in() ) { 
	$args['menu'] = 'Logged In';
} else { 
	$args['menu'] = 'Logged Out';
} 
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

// Custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url(/wp-content/uploads/2016/10/ds-logo-lg.png) !important; background-size: 100% !important; width: 320px !important; height: 93px !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');
?>