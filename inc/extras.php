<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

add_filter( 'body_class', 'understrap_body_classes' );

if ( ! function_exists( 'understrap_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function understrap_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'understrap_adjust_body_class' );

if ( ! function_exists( 'understrap_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function understrap_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'understrap_change_logo_class' );

if ( ! function_exists( 'understrap_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function understrap_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"' , $html );

		return $html;
	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists ( 'understrap_post_nav' ) ) {
	function understrap_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
				<nav class="container navigation post-navigation">
					<h2 class="sr-only"><?php _e( 'Post navigation', 'understrap' ); ?></h2>
					<div class="row nav-links justify-content-between">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'understrap' ) );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next">%link</span>',     _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'understrap' ) );
							}
						?>
					</div><!-- .nav-links -->
				</nav><!-- .navigation -->

		<?php
	}
}

/**
 * Load AGP Workshops post type

*/
require get_template_directory() . '/inc/admin_menu_templates/agp_workshops.php';

/**
 * Load AGP Facilitators post type

*/
require get_template_directory() . '/inc/admin_menu_templates/agp_facilitators.php';
/**
 * Load AGP Registration Form post type

*/
require get_template_directory() . '/inc/extras-mansur.php';
/**
	* Remove dashboard widgets for non admin users
*/
// disable default dashboard widgets

add_action('admin_init', 'disable_default_dashboard_widgets');

function disable_default_dashboard_widgets() {
	
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}



// Remove product data tabs

add_filter( 'woocommerce_register_post_type_product', 'custom_post_type_label_woo' );

function custom_post_type_label_woo( $args ){
    $labels = array(
        'name'               =>  'Workshops_Woo',
        'singular_name'      =>  'Workshop_woo',
        'menu_name'          =>  'Workshops_woo', 'Admin menu name',
        'add_new'            =>  'Create Workshop',
		'add_new_item'       =>  'Create New Workshop',
        'edit'               =>  'Edit Workshops',
        'edit_item'          =>  'Edit Workshop',
        'new_item'           =>  'New Workshop',
        'view'               =>  'View Workshops',
        'view_item'          =>  'View Workshop',
        'search_items'       =>  'Search Workshops',
        'not_found'          =>  'No Workshop found',
		'not_found_in_trash' =>  'No Workshop found in trash',
        'parent'             =>  'Parent Workshop'
    );

    $args['labels'] = $labels;
    return $args;
}


// Custom Title for New Workshop
function custom_post_title($input){
if('product' === get_post_type()){
	return "Title";}
return $input;
}
add_filter('enter_title_here', 'custom_post_title'); 


/* Customize Product Categories Labels */
add_filter( 'woocommerce_taxonomy_args_product_cat', 'custom_wc_taxonomy_args_product_cat' );
function custom_wc_taxonomy_args_product_cat( $args ) {
	$args['label'] = ('Workshop Categories');
	$args['labels'] = array(
        'name' 				=> 'Workshop Categories',
        'singular_name' 	=> 'Workshop Category',
        'menu_name'			=> 'Categories', 'Admin menu name',
        'search_items' 		=> 'Search Workshop Categories',
        'all_items' 		=> 'All Workshop Categories',
        'parent_item' 		=> 'Parent Workshop Category',
        'parent_item_colon' => 'Parent Workshop Category:',
        'edit_item' 		=> 'Edit Workshop Category',
        'update_item' 		=> 'Update Workshop Category',
        'add_new_item' 		=> 'Add New Workshop Category',
        'new_item_name' 	=> 'New Workshop Category Name'
	);

	return $args;
}

/* Customize Product Tags Labels */
add_filter( 'woocommerce_taxonomy_args_product_tag', 'custom_wc_taxonomy_args_product_tag' );
function custom_wc_taxonomy_args_product_tag( $args ) {
	$args['label'] = __( 'Product Tags', 'woocommerce' );
	$args['labels'] = array(
	    'name' 				=> __( 'Workshop Tags', 'woocommerce' ),
	    'singular_name' 	=> __( 'Workshop Tag', 'woocommerce' ),
        'menu_name'			=> _x( 'Tags', 'Admin menu name', 'woocommerce' ),
	    'search_items' 		=> __( 'Search Workshop Tags', 'woocommerce' ),
	    'all_items' 		=> __( 'All Workshop Tags', 'woocommerce' ),
	    'parent_item' 		=> __( 'Parent Workshop Tag', 'woocommerce' ),
	    'parent_item_colon' => __( 'Parent Workshop Tag:', 'woocommerce' ),
	    'edit_item' 		=> __( 'Edit Workshop Tag', 'woocommerce' ),
	    'update_item' 		=> __( 'Update Workshop Tag', 'woocommerce' ),
	    'add_new_item' 		=> __( 'Add New Workshop Tag', 'woocommerce' ),
	    'new_item_name' 	=> __( 'New Workshop Tag Name', 'woocommerce' )
	);

	return $args;
}

/* Custom Product Data Tabs */
add_filter( 'woocommerce_product_data_tabs', 'custom_product_data_tabs');

function custom_product_data_tabs($args){
	$custom_label = array(
		'general' => array(
			'label'    => __( 'Price', 'woocommerce' ),
			'target'   => 'general_product_data',
			'class'    => array( 'hide_if_grouped' ),
			'priority' => 10,
		),
		'inventory' => array(
			'label'    => __( 'Inventory', 'woocommerce' ),
			'target'   => 'inventory_product_data',
			'class'    => array( 'show_if_simple', 'show_if_variable', 'show_if_grouped', 'show_if_external' ),
			'priority' => 20,
		),
		'shipping' => array(
			'label'    => __( 'Shipping', 'woocommerce' ),
			'target'   => 'shipping_product_data',
			'class'    => array( 'hide_if_virtual', 'hide_if_grouped', 'hide_if_external' ),
			'priority' => 30,
		),
		'linked_product' => array(
			'label'    => __( 'Linked Products', 'woocommerce' ),
			'target'   => 'linked_product_data',
			'class'    => array(),
			'priority' => 40,
		),
		'attribute' => array(
			'label'    => __( 'Attributes', 'woocommerce' ),
			'target'   => 'product_attributes',
			'class'    => array(),
			'priority' => 50,
		),
		'variations' => array(
			'label'    => __( 'Variations', 'woocommerce' ),
			'target'   => 'variable_product_options',
			'class'    => array( 'variations_tab', 'show_if_variable' ),
			'priority' => 60,
		),
		'advanced' => array(
			'label'    => __( 'Advanced', 'woocommerce' ),
			'target'   => 'advanced_product_data',
			'class'    => array(),
			'priority' => 70,
		),
	);
		
	$args = $custom_label;
	return $args;
}

/* Adding custom icon to Creat Workshops */
function replace_admin_menu_icons_css() {
    ?>
    <style>
    #adminmenu #menu-posts-product .menu-icon-post div.wp-menu-image::before, #adminmenu #menu-posts-product .menu-icon-product div.wp-menu-image::before {
	
	content: '\e01c';
}
    </style>
    <?php
}

add_action( 'admin_head', 'replace_admin_menu_icons_css' );



/* 
	Custom Sidebar Navigation Walker
*/

require get_template_directory() . '/inc/mobile-nav-walker.php';

/* Altering admin user list */

function alter_user_list( $result, $user, $field, $post_id ) {
	$result = $user->first_name .' '. $user->last_name;
	return  $result;
}
add_filter("acf/fields/user/result/name=unit_name", 'alter_user_list', 10, 4);

/*
	==============================
	Custom admin options for theme
	==============================

*/

add_action('wp_dashboard_setup', 'custom_dashboard_widgets');
  
function custom_dashboard_widgets() {
	
	require_once(get_template_directory() . '/inc/admin_menu_templates/dashboard/dashboard.php');
	
}


// Indian Currency in Gravity Forms

add_filter( 'gform_currencies', 'add_inr_currency' );
function add_inr_currency( $currencies ) {
    $currencies['INR'] = array(
        'name'               => __( 'India Rupee', 'gravityforms' ),
        'symbol_left'        => '&#8377;',
        'symbol_right'       => '',
        'symbol_padding'     => ' ',
        'thousand_separator' => ',',
        'decimal_separator'  => '.',
        'decimals'           => 2
    );
 
    return $currencies;
}

// Disable wordpress emoji and speed up the page
