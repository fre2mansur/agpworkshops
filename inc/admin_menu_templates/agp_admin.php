<?php

//Generate Menu Page
add_menu_page( 'Agp Theme Options', 'Marketing', 'manage_options', 'agp_settings', 'agp_theme_create_page', '
dashicons-admin-generic', 50 );

//Generate Sub menu pages
add_submenu_page( 'agp_settings', 'Agp Theme Options', 'General Settings', 'manage_options', 'agp_settings', 'agp_theme_create_page' );


//Activate custom settings
add_action( 'admin_init', 'agp_custom_settings' );


function agp_custom_settings(){
	register_setting('agp-settings-group', 'facebook');
	register_setting('agp-settings-group', 'twitter');
	register_setting('agp-settings-group', 'linkedin');
	register_setting('agp-settings-group', 'instagram');
	register_setting('agp-settings-group', 'googleanalytics');
	register_setting('agp-settings-group', 'pixelanalytics');
	add_settings_section('agp-social-options', 'Social Links' , 'agp_social_options', 'agp_settings');
	add_settings_field('Facebook-Link', 'Facebook', 'agp_facebook_link', 'agp_settings', 'agp-social-options');
	add_settings_field('Twitter-Link', 'Twitter', 'agp_twitter_link', 'agp_settings', 'agp-social-options');
	add_settings_field('Instagram-Link', 'Instagram', 'agp_insta_link', 'agp_settings', 'agp-social-options');
	add_settings_field('LinkedIn-Link', 'LinkedIn', 'agp_linkedin_link', 'agp_settings', 'agp-social-options');
	
	add_settings_field( 'Google_Analytics-Link', 'Google Analytics', 'agp_google_analytics_link','agp_settings', 'agp-social-options' );
	add_settings_field( 'pixel_analytics-Link', 'Pixel Analytics', 'agp_pixel_analytics_link','agp_settings', 'agp-social-options' );
}



function agp_theme_create_page() {
	//generation of our admin page
	require_once( get_template_directory() . '/inc/admin_menu_templates/general_settings.php' );
}
