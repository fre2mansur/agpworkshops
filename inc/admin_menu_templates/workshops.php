<?php 

/*
	====================
	Custom Taxonomy Type
	====================

*/

function custom_agp_taxonomy() {

	/**
	 * Taxonomy: Categories.
	 */

	$labels = array(
		"name" 			=> __( "Workshop Categories", "AGP | Workshops" ),
		"singular_name" => __( "Workshop Category", "AGP | Workshops" ),
		"menu_name" 	=> __( "Workshop Categories", "AGP | Workshops" ),
		"all_items" 	=> __( "All Workshop Categories", "AGP | Workshops" ),
		"edit_item"	 	=> __( "Edit Workshop Category", "AGP | Workshops" ),
		"view_item" 	=> __( "View Workshop Category", "AGP | Workshops" ),
		"update_item" 	=> __( "Update Workshop Category", "AGP | Workshops" ),
		"add_new_item" 	=> __( "Add New Workshop Category", "AGP | Workshops" ),
		"new_item_name" => __( "New category name", "AGP | Workshops" ),
		"parent_item" 	=> __( "Parent Workshop Category", "AGP | Workshops" ),
		"not_found" 	=> __( "No workshop category found", "AGP | Workshops" ),
		"no_terms" 		=> __( "No workshop categories", "AGP | Workshops" ),
		"items_list" 	=> __( "Workshop categories list", "AGP | Workshops" ),
		"parent_item_colon" 		 => __( "Parent Workshop Category:", "AGP | Workshops" ),
		"search_items" 				 => __( "Search Workshop Category", "AGP | Workshops" ),
		"popular_items" 			 => __( "Popular Workshop Categories", "AGP | Workshops" ),
		"separate_items_with_commas" => __( "Separate Workshop Categories With Commas", "AGP | Workshops" ),
		"add_or_remove_items" 		 => __( "Add or Remove Workshop Categories", "AGP | Workshops" ),
		"choose_from_most_used" 	 => __( "Choose from most used Workshop Categories", "AGP | Workshops" ),
		"items_list_navigation" 	 => __( "Workshop categories list navigation", "AGP | Workshops" ),
		
	);

	$args = array(
		"label" 			 => __( "Workshop Categories", "AGP | Workshops" ),
		"labels" 			 => $labels,
		"public" 			 => true,
		"hierarchical"  	 => true,
		"show_ui" 			 => true,
		"show_in_menu"  	 => true,
		"show_in_nav_menus"  => true,
		"query_var" 		 => true,
		"rewrite" 			 => array( 'slug' => 'workshop_category', 'with_front' => true, ),
		"show_admin_column"  => true,
		"show_in_rest" 		 => true,
		"rest_base" 		 => "workshop_cat_rest",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "workshop_category", array( "workshops","facilitators","units" ), $args );
}
add_action( 'init', 'custom_agp_taxonomy' );



/*
	================
	Custom Post Type
	================

*/
function custom_agp_workshops() {

	/**
	 * Post Type: Workshops.
	 */

	$labels = array(
		"name" 			=> __( "Workshops", "AGP | Workshops" ),
		"singular_name" => __( "Workshop", "AGP | Workshops" ),
		"menu_name"		=> __( "Workshops", "AGP | Workshops" ),
		"all_items" 	=> __( "All Workshops", "AGP | Workshops" ),
		"add_new" 		=> __( "Add New", "AGP | Workshops" ),
		"add_new_item"  => __( "Add New Workshop", "AGP | Workshops" ),
		"edit_item" 	=> __( "Edit Workshop", "AGP | Workshops" ),
		"new_item" 		=> __( "New Workshop", "AGP | Workshops" ),
		"view_item" 	=> __( "View All Workshop", "AGP | Workshops" ),
		"view_items" 	=> __( "View All Workshops", "AGP | Workshops" ),
		"search_items"  => __( "Search Workshops", "AGP | Workshops" ),
		"not_found" 	=> __( "No Workshop(s) found", "AGP | Workshops" ),
		"not_found_in_trash" 		=> __( "No Workshop(s) found in Trash", "AGP | Workshops" ),
		"parent_item_colon" 		=> __( "Unit:", "AGP | Workshops" ),
		"featured_image" 			=> __( "Featured image ", "AGP | Workshops" ),
		"set_featured_image" 		=> __( "Set featured image", "AGP | Workshops" ),
		"remove_featured_image" 	=> __( "Remove featured image ", "AGP | Workshops" ),
		"use_featured_image" 		=> __( "Use as featured image ", "AGP | Workshops" ),
		"archives" 					=> __( "Workshop Archive", "AGP | Workshops" ),
		"insert_into_item" 			=> __( "Insert into workshop", "AGP | Workshops" ),
		"uploaded_to_this_item" 	=> __( "Upload to this workshop", "AGP | Workshops" ),
		"filter_items_list" 		=> __( "Filter workshops list", "AGP | Workshops" ),
		"items_list_navigation" 	=> __( "Workshops list navigation", "AGP | Workshops" ),
		"items_list" 				=> __( "Workshops List", "AGP | Workshops" ),
		"attributes" 				=> __( "Workshop attributes", "AGP | Workshops" ),
		"parent_item_colon"			=> __( "Unit:", "AGP | Workshops" ),
	);

	$args = array(
		"label"				 => __( "Workshops", "AGP | Workshops" ),
		"labels"			 => $labels,
		"description" 		 => "Create, edit and manage all workshops for Auroville Green Practices",
		"public"			 => true,
		"publicly_queryable" => true,
		"show_ui"			 => true,
		"delete_with_user"	 => false,
		"show_in_rest"		 => false,
		"rest_base"			 => "",
		"has_archive"		 => false,
		"show_in_menu"		 => true,
		"show_in_nav_menus"	 => true,
		"exclude_from_search"		 => false,
		"capability_type" 			 => "post",
		"map_meta_cap"				 => true,
		"hierarchical"				 => true,
		"rewrite"					 => array( "slug" => "workshops", "with_front" => true ),
		"query_var"					 => true,
		"menu_position"				 => 40,
		"menu_icon"					 => "dashicons-editor-paste-word",
		"supports"					 => array( "title", "custom-fields", "post-formats", "filter", "thumbnail" ),
		"taxonomies"				 => array( "workshop_category","post_tag", ),
	);

	register_post_type( "workshops", $args );
}

add_action( 'init', 'custom_agp_workshops' );

