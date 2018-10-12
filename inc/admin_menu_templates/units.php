<?php 
/*
	================
	Custom Post Type
	================

*/
function custom_auroville_units() {

	/**
	 * Post Type: Organising Units.
	 */

	$labels = array(
		"name" 			=> __( "Organising Units", "AGP | Organising Units" ),
		"singular_name" => __( "Organising Unit", "AGP | Organising Units" ),
		"menu_name"		=> __( "Organising Units", "AGP | Organising Units" ),
		"all_items" 	=> __( "All Organising Units", "AGP | Organising Units" ),
		"add_new" 		=> __( "Add New", "AGP | Organising Units" ),
		"add_new_item"  => __( "Add New Organising Unit", "AGP | Organising Units" ),
		"edit_item" 	=> __( "Edit Organising Unit", "AGP | Organising Units" ),
		"new_item" 		=> __( "New Organising Unit", "AGP | Organising Units" ),
		"view_item" 	=> __( "View All Organising Units", "AGP | Organising Units" ),
		"view_items" 	=> __( "View All Organising Units", "AGP | Organising Units" ),
		"search_items"  => __( "Search Organising Units", "AGP | Organising Units" ),
		"not_found" 	=> __( "No Organising Unit(s) found", "AGP | Organising Units" ),
		"not_found_in_trash" 		=> __( "No Organising Unit(s) found in Trash", "AGP | Organising Units" ),
		"parent_item_colon" 		=> __( "Unit:", "AGP | Organising Units" ),
		"featured_image" 			=> __( "Featured image ", "AGP | Organising Units" ),
		"set_featured_image" 		=> __( "Set featured image", "AGP | Organising Units" ),
		"remove_featured_image" 	=> __( "Remove featured image ", "AGP | Organising Units" ),
		"use_featured_image" 		=> __( "Use as featured image ", "AGP | Organising Units" ),
		"archives" 					=> __( "Organising Unit Archive", "AGP | Organising Units" ),
		"insert_into_item" 			=> __( "Insert into Organising Unit", "AGP | Organising Units" ),
		"uploaded_to_this_item" 	=> __( "Upload to this Organising Unit", "AGP | Organising Units" ),
		"filter_items_list" 		=> __( "Filter Organising Units list", "AGP | Organising Units" ),
		"items_list_navigation" 	=> __( "Organising Units list navigation", "AGP | Organising Units" ),
		"items_list" 				=> __( "Organising Units List", "AGP | Organising Units" ),
		"attributes" 				=> __( "Organising Unit attributes", "AGP | Organising Units" ),
		"parent_item_colon"			=> __( "Unit:", "AGP | Organising Units" ),
	);

	$args = array(
		"label"				 => __( "Organising Units", "AGP | Organising Units" ),
		"labels"			 => $labels,
		"description" 		 => "Create, edit and manage all Organising Units for Auroville Green Practices",
		"public"			 => true,
		"publicly_queryable" => true,
		"show_ui"			 => true,
		"delete_with_user"	 => false,
		"show_in_rest"		 => false,
		"rest_base"			 => "",
		"has_archive"		 => true,
		"show_in_menu"		 => true,
		"show_in_nav_menus"	 => true,
		"exclude_from_search"		 => false,
		"capability_type" 			 => "post",
		"map_meta_cap"				 => true,
		"hierarchical"				 => true,
		"rewrite"					 => array( "slug" => "organising-unit", "with_front" => true ),
		"query_var"					 => true,
		"menu_position"				 => 42,
		"menu_icon"					 => "dashicons-welcome-learn-more",
		"supports"					 => array( "title", "custom-fields","editor", "filter", "thumbnail" ),
		"taxonomies"				 => array( "workshop_category" ),
	);

	register_post_type( "organising-unit", $args );
}

add_action( 'init', 'custom_auroville_units' );

function change_default_title( $title ){
	$screen = get_current_screen();

	if  ( $screen->post_type == 'organising-unit' ) {
		 return 'Enter Full Name Here';
	}
}

add_filter( 'enter_title_here', 'change_default_title' );