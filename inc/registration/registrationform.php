<?php
function create_registration_post() {
 
 register_post_type( 'registration_form',
 // CPT Options
     array(
         'labels' => array(
            'name'                => _x( 'Registrations', 'Post Type General Name', 'understrap' ),
            'singular_name'       => _x( 'Registration', 'Post Type Singular Name', 'understrap' ),
            'menu_name'           => __( 'Forms', 'understrap' ),
            'all_items'           => __( 'All Forms', 'understrap' ),
            'view_item'           => __( 'View', 'understrap' ),
            'add_new_item'        => __( 'Add New', 'understrap' ),
            'add_new'             => __( 'Add New', 'understrap' ),
            'edit_item'           => __( 'Edit', 'understrap' ),
            'update_item'         => __( 'Update', 'understrap' ),
            'search_items'        => __( 'Search', 'understrap' ),
            'not_found'           => __( 'Not Found', 'understrap' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'understrap' )
         ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array('slug' => 'applications'),
     )
 );
}

//Hook this post type
add_action( 'init', 'create_registration_post' );

