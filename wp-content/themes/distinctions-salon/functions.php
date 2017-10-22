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


// changing the logo link from wordpress.org to your site
function mb_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mb_login_url' );

// changing the alt text on the logo to show your site name
function mb_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mb_login_title' );

// Admin login start
function my_login_logo() { ?>
    <style type="text/css">
    	body {
    		background-image: url(/wp-content/uploads/2016/10/bg-login.jpg) !important;
    		background-size: cover !important;
    	}

    	#login {
			min-width: 300px !important;
			max-width: 650px !important;
			padding: 40px 0 0 0 !important;
    	}

        #login h1 a, .login h1 a {
            background-image: url(/wp-content/uploads/2016/10/ds-logo-tag-lg.png);
            background-size: 300px;
            width: 100%;
            height: 52px;
            margin: 0;
        }

        #login #login_error, #login .message {
        	background-color: transparent;
        	color: white;
        	border: none;
        	text-align: center;
        }

        #loginform, #registerform, #lostpasswordform {
        	background-color: rgba(0, 0, 0, 0.25);
        }

    	#loginform p label,
        #registerform p label,
        #lostpasswordform p label {
    		color: #FFFFFF;
    	}

    	#loginform p label input,
        #registerform p label input,
        #lostpasswordform p label input {
    		color: #FFFFFF;
    		background: transparent;
    		border-color: #FFFFFF;
    	}

        /* AIOWPS Start */
        #loginform .aiowps-captcha-equation strong,
        #registerform .aiowps-captcha-equation strong,
        #lostpasswordform .aiowps-captcha-equation strong {
            color: #f3d482;
        }

        #loginform .aiowps-captcha-equation strong #aiowps-captcha-answer,
        #registerform .aiowps-captcha-equation strong #aiowps-captcha-answer,
        #lostpasswordform .aiowps-captcha-equation strong #aiowps-captcha-answer {
            color: #FFFFFF;
            background: transparent;
            border-color: #FFFFFF;
        }

        #reg_passmail {
            color: white;
        }
        
        /* AIOWPS End */

    	#wp-submit {
    		background-color: #ffb540;
    		border: none;
    		text-shadow: none;
    		box-shadow: none;
    		color: #000001;
    	}

    	#nav a, #backtoblog a {
			color: #FFFFFF !important;
    	}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Distinctions Salon';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function avia_year_func( $atts ){
    return date("Y");
}
add_shortcode( 'cur_year', 'avia_year_func' );

?>