<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */
if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
		
		//Hoem page Portfolio assets
		// wp_enqueue_script( 'jquery');
		// wp_enqueue_script( 'jquery-mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array(), '1.0.0', true );
   		// wp_enqueue_script( 'jquery-filter', get_template_directory_uri() . '/js/filter.js',array(), '1.0.0', true );
		
		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		wp_enqueue_script('masonry-js', get_template_directory_uri() . '/js/masonry.min.js', array('jquery'), '4.2.2', true);
		wp_enqueue_script('headroom-js', get_template_directory_uri() . '/js/headroom.min.js', array('jquery'), null, true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array('masonry-js','headroom-js'), $js_version, true );
		wp_localize_script('understrap-scripts','gfcustom_Ajax_function',['ajaxurl' => admin_url('admin-ajax.php'), 'ajax_nonce' => wp_create_nonce('custom_nonce_filter')]);
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).
add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

// Add admin scripts for custom javascripts
function admin_chart_scripts() {
	wp_enqueue_style( 'admin-line-icons','https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css', array(), true);
	wp_enqueue_script( 'admin-chart-script',get_template_directory_uri() . '/js/chartjs.min.js', array(),'2.7.2', false );
}
add_action( 'admin_enqueue_scripts', 'admin_chart_scripts' );?>