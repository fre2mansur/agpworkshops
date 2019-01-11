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
require get_template_directory() . '/inc/admin_menu_templates/workshops.php';

/** 
 * Load AGP Units post type
*/
require get_template_directory() . '/inc/admin_menu_templates/units.php';
/**
 * Load AGP Facilitators post type

*/
require get_template_directory() . '/inc/admin_menu_templates/facilitators.php';
/**
 * Load AGP Registration Form post type

*/
// require get_template_directory() . '/inc/extras-mansur.php';
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



// Custom Title for New Workshop
function custom_post_title($input){
if('product' === get_post_type()){
	return "Title";}
return $input;
}
add_filter('enter_title_here', 'custom_post_title'); 

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

//Reordered Gravity Forms in admin menu: https://docs.gravityforms.com/gform_menu_position/
add_filter( 'gform_menu_position', 'my_gform_menu_position' );
function my_gform_menu_position( $position ) {
    return 30;
}
// Disable wordpress emoji and speed up the page

/**
 * Disable the emoji's
 */
 function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
   function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
   }
   
   /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
   }


/*
    in this example I have a repeater field named "date_repeater"
    one of the rows of this repeater is named "start_date"
    and I want to be able to search, sort and filter by this field
*/
 
// create a function that will convert this repeater during the acf/save_post action
// priority of 20 to run after ACF is done saving the new values

function date_repeater_ACF_converter($post_id) {
	$repeaterDates = get_field('date_repeater', $post_id);

	global $wpdb;
	$tablename = $wpdb->prefix.'workshop_dates';
	$wpdb->delete( $tablename, array(
		'post_id' => $post_id) 
		);
	save_start_end_date_In_custom_table($post_id);
}

add_filter('acf/save_post', 'date_repeater_ACF_converter', 20);
 
function save_start_end_date_In_custom_table($post_id) {
   
  // pick a new meta_key to hold the values of the start_date field
  // I generally name this field by suffixing _wp to the field name
  // as this makes it easy for me to remember this field name
  // also note, that this is not an ACF field and will not
  // appear when editing posts, it is just a db field that we
  // will use for searching

  $meta_key = 'workshop_date';

   
     // the next step is to delete any values already stored
    // so that we can update it with new values
   // and we don't need to worry about removing a value
  // when it's deleted from the ACF repeater
 //  delete_post_meta($post_id, $meta_key);
   
  // create an array to hold values that are already added
  // this way we won't add the same meta value more than once
  // because having the same value to search and filter by
  // would be pointless
  $saved_values = array();
  

  
  //delete all records from wp_workshop_dates based on post_id
   
  // now we'll look at the repeater and save any values
  if (have_rows('date_repeater', $post_id)) {
    while (have_rows('date_repeater', $post_id)) {
	  the_row();
	  

		// insert query for workshp dates for each iterating reord of the loop.
	   
	  

      // get the value of this row
      $startDate = get_sub_field('start_date',false,false);
      $endDate = get_sub_field('end_date',false,false); 
      // see if this value has already been saved
      // note that I am using isset rather than in_array
      // the reason for this is that isset is faster than in_array
      if (isset($saved_values[$startDate])) {
        // no need to save this one we already have it
        continue;
      }
       
      // not already save, so add it using add_post_meta()
      // note that we are using false for the 4th parameter
      // this means that this meta key is not unique
      // and can have more then one value
	  //   add_post_meta($post_id, $meta_key, $startDate, false);

		
		global $wpdb;
		$tablename = $wpdb->prefix.'workshop_dates';
	   	$wpdb->insert( $tablename, array(
		   'post_id' => $post_id, 
		   'start_date' => $startDate,
		   'end_date' => $endDate ),
		   array( '%s', '%s', '%s') 
	   );
		
       
      // add it to the values we've already saved

      $saved_values[$bothDate] = $startDate.",".$endDate;

       
    } // end while have rows
  } // end if have rows
} // end function
 
/*
    15 lines of code and now instead of dealing with complicated filters
    and "LIKE" queries and modifying the WHERE portion of the query
    and slowing down our site, instead we can simply use the
    start_date_wp meta key in a simple more simple WP_Query()
   
*/


// Add search button to the End of the Right menu 

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
	if( $args->theme_location == 'right' )   //Theme_Location is actually getting the location name defined in Understrap Setup
	$items .=	'<li class="nav-item" id="search-trigger">
	<a class="nav-link" data-toggle="collapse" href="#search_drawer" role="button" aria-expanded="false" aria-controls="search_drawer">
	<i class="fa fa-search"></i></a></li>';
				  
	
   return $items;
}

//Testing javascript defer
function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('jquery', 'jquery-mixitup','isotope-js','understrap-scripts', );
	
	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer="defer" src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
  