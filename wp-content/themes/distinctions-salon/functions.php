<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/dist/scripts.min.js', array(), '1.0.0', true );

}

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
add_action('login_head', 'custom_login_logo');
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url(/wp-content/uploads/2016/10/ds-logo-lg.png) !important; background-size: 100% !important; width: 320px !important; height: 93px !important; }
	</style>';
}

// changing the logo link from wordpress.org to your site
function mb_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mb_login_url' );

// changing the alt text on the logo to show your site name
function mb_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mb_login_title' );
?>