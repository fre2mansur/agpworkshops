<style>
	@media only screen and (min-width: 500px) {
		#dashboard-widgets .postbox-container {
			width:50% !important;
		}
	}
	.metabox-holder .postbox-container .empty-container{
		border: none !important;
	}
</style>
<?php 
$user = wp_get_current_user();

if ( in_array( 'administrator', (array) $user->roles ) ) {
	global $wp_meta_boxes;
	wp_add_dashboard_widget( 'widget1', 'Sales per month', 'sales_charts_function' );

	wp_add_dashboard_widget( 'widget2', 'Analytics and Social Links', 'analytics_charts_function' );

	function sales_charts_function(){
	require_once( get_template_directory() . '/inc/admin_menu_templates/sales_charts.php' );

	}

	function analytics_charts_function(){
    
        require_once( get_template_directory() . '/inc/admin_menu_templates/agp_admin.php' );

    };
	
	}

if ( in_array( 'unit_mentor', (array) $user->roles ) ) {
	global $wp_meta_boxes;
	
	wp_add_dashboard_widget( 'widget1', 'How to create new workshop', 'create_workshop_help_function','dashboard','normal','core');
	
	wp_add_dashboard_widget( 'widget2', 'New Sales', 'analytics_charts_function','dashboard','side','high' );
	
	function create_workshop_help_function(){
		require_once( get_template_directory() . '/inc/admin_menu_templates/agp_unit_helper.php' );
	
	}
	
	function analytics_charts_function(){
		
			require_once( get_template_directory() . '/inc/admin_menu_templates/agp_themecolor.php' );
	
		};
		
	}

