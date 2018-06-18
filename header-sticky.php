<?php
/**
 * The sticky header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<?php print get_option( 'googleanalytics'); ?>
	<?php print get_option( 'pixelanalytics'); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-xl navbar-light sticky-top bg-white p-3 border-bottoms" role="navigation" id="navbar">
		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>
		<?php if(! has_custom_logo() ) {?>
			<?php if (is_front_page() && is_home() ) : ?>
				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url('/') );?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>

		<?php } else ?>
			<div id="brand_logo" class="d-flex navbar-brand p-0 m-0 col-xl-2 col-lg-4 col-md-6 col-9">
				<?php {the_custom_logo(); }?> 
			</div>
		
			<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
        </button>

			<div class="row d-xl-none offset-1 col-12">
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'Secondary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav justify-content-between',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			</div>
				      <div class="d-none d-xl-flex ml-auto align-content-end">
          <form class="form-inline my-2 my-lg-0">
			 <div class="border-bottom border-light has-focus"> <input class="form-control no-focus mr-sm-2 border-0" type="search" placeholder="Search" aria-label="Search">
			  <span class="fa fa-search"></span></div>
             
            </form>
      </div>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
