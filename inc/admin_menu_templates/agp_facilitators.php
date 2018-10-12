<?php 
/*
	================
	Custom Post Type
	================

*/
function custom_agp_Facilitators() {

	/**
	 * Post Type: Facilitators.
	 */

	$labels = array(
		"name" 			=> __( "Facilitators", "AGP | Facilitators" ),
		"singular_name" => __( "Facilitator", "AGP | Facilitators" ),
		"menu_name"		=> __( "Facilitators", "AGP | Facilitators" ),
		"all_items" 	=> __( "All Facilitators", "AGP | Facilitators" ),
		"add_new" 		=> __( "Add New", "AGP | Facilitators" ),
		"add_new_item"  => __( "Add New Facilitator", "AGP | Facilitators" ),
		"edit_item" 	=> __( "Edit Facilitator", "AGP | Facilitators" ),
		"new_item" 		=> __( "New Facilitator", "AGP | Facilitators" ),
		"view_item" 	=> __( "View All Facilitator", "AGP | Facilitators" ),
		"view_items" 	=> __( "View All Facilitators", "AGP | Facilitators" ),
		"search_items"  => __( "Search Facilitators", "AGP | Facilitators" ),
		"not_found" 	=> __( "No Facilitator(s) found", "AGP | Facilitators" ),
		"not_found_in_trash" 		=> __( "No Facilitator(s) found in Trash", "AGP | Facilitators" ),
		"parent_item_colon" 		=> __( "Unit:", "AGP | Facilitators" ),
		"featured_image" 			=> __( "Featured image ", "AGP | Facilitators" ),
		"set_featured_image" 		=> __( "Set featured image", "AGP | Facilitators" ),
		"remove_featured_image" 	=> __( "Remove featured image ", "AGP | Facilitators" ),
		"use_featured_image" 		=> __( "Use as featured image ", "AGP | Facilitators" ),
		"archives" 					=> __( "Facilitator Archive", "AGP | Facilitators" ),
		"insert_into_item" 			=> __( "Insert into Facilitator", "AGP | Facilitators" ),
		"uploaded_to_this_item" 	=> __( "Upload to this Facilitator", "AGP | Facilitators" ),
		"filter_items_list" 		=> __( "Filter Facilitators list", "AGP | Facilitators" ),
		"items_list_navigation" 	=> __( "Facilitators list navigation", "AGP | Facilitators" ),
		"items_list" 				=> __( "Facilitators List", "AGP | Facilitators" ),
		"attributes" 				=> __( "Facilitator attributes", "AGP | Facilitators" ),
		"parent_item_colon"			=> __( "Unit:", "AGP | Facilitators" ),
	);

	$args = array(
		"label"				 => __( "Facilitators", "AGP | Facilitators" ),
		"labels"			 => $labels,
		"description" 		 => "Create, edit and manage all Facilitators for Auroville Green Practices",
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
		"rewrite"					 => array( "slug" => "agp_Facilitator", "with_front" => true ),
		"query_var"					 => true,
		"menu_position"				 => 40,
		"menu_icon"					 => "dashicons-welcome-learn-more",
		"supports"					 => array( "title", "custom-fields","editor", "filter", "thumbnail" ),
		"taxonomies"				 => array( "workshop_category" ),
	);

	register_post_type( "agp_Facilitator", $args );
}

add_action( 'init', 'custom_agp_Facilitators' );

function change_facilitator_default_title( $title ){
	$screen = get_current_screen();

	if  ( $screen->post_type == 'agp_facilitator' ) {
		 return 'Enter Full Name Here';
	}
}

add_filter( 'enter_title_here', 'change_facilitator_default_title' );