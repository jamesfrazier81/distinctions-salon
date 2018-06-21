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

// Add first and last name 
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

    $first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
    $last_name = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';

        ?>
        <p>
            <label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
                <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" size="25" /></label>
        </p>

        <p>
            <label for="last_name"><?php _e( 'Last Name', 'mydomain' ) ?><br />
                <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr( wp_unslash( $last_name ) ); ?>" size="25" /></label>
        </p>

        <?php
    }

    //2. Add validation. In this case, we make sure first_name is required.
    add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
    function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {

        if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
            $errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
        }
        if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['first_name'] ) == '' ) {
            $errors->add( 'last_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
        }
        return $errors;
    }

    //3. Finally, save our extra registration user meta.
    add_action( 'user_register', 'myplugin_user_register' );
    function myplugin_user_register( $user_id ) {
        if ( ! empty( $_POST['first_name'] ) ) {
            update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
            update_user_meta( $user_id, 'last_name', trim( $_POST['last_name'] ) );
        }
    }
    
?>