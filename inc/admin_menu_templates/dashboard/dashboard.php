<?php 

require_once(get_template_directory() . '/vendor/autoload.php');


add_action( 'admin_enqueue_scripts', 'load_admin_styles' );

function load_admin_styles() {
		// Bail if not viewing the main dashboard page
    wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css');
}

$user = wp_get_current_user();

if ( in_array( 'administrator', (array) $user->roles ) ) {
	global $wp_meta_boxes;
	add_action( 'admin_footer',"admin_dashboard_after_login");
	function admin_dashboard_after_login(){
	require_once(get_template_directory() . '/inc/admin_menu_templates/dashboard/admin_dashboard_logged_in.php');
	}
	}

if ( in_array( 'unit_mentor', (array) $user->roles ) ) {
	global $wp_meta_boxes;
	add_action( 'admin_footer',"create_workshop_help_function");
	function create_workshop_help_function(){
		require_once( get_template_directory() . '/inc/admin_menu_templates/dashboard/units_dashboard/agp_unit_helper.php' );
	
	}
		
	}

