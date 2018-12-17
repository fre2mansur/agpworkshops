<?php
/**
 * The header for our theme.
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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes, minimum-scale=0.86">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">  

  <!-- Mobile Menu   -->
  <?php
if ( wp_is_mobile() ) {
  
  /* Display and echo mobile specific stuff here */
  ?>
  <nav class="mobile-menu-parent navbar-default shadow bg-white flex-row header header--fixed hide-from-print mb-4" id="header-menu">
    <div class="d-flex justify-content-around align-items-center p-2 w-100" >  
      <button class="menu-btn navbar-toggler d-inline-flex px-1" type="button" onclick="" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30" >
          <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
          <path class="line middle" d="m 70,50 h -40" />
          <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
      </button>

      <!-- Your site title as branding in the menu -->
      <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            $style = ' background-image: url("'.$logo_url[0].'"); background-size: contain; background-repeat:no-repeat; background-position:center center; min-height:50px;
              min-width:235px; width:50%; vertical-align:middle; transition: all 0.2s linear;';
      ?>
      <?php if ( ! has_custom_logo() ) { ?>
        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
      <?php } else { ?>
        <a rel='home' href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"> <div id="logo" style='<?php echo $style; ?>'></div></a>
      <?php } ?>

      <button class="menu-btn navbar-toggler d-inline-flex px-1 justify-content-end" type="button"  onclick="" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30">
          <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
          <path class="line middle" d="m 70,50 h -40" />
          <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
      </button>   
    </div>
    <!--<span class="mobile-search container"><input type="text" name="search" placeholder="Search" id="search-box" class=""></span> -->

    <!-- The Mobile Menu goes here -->
    <?php wp_nav_menu(
					array(
						'theme_location'  => 'mobile',
						'container_class' => 'container-fluid bg-white collapse navbar-collapse d-lg-none',
						'container_id'    => 'mobilemenu',
						'menu_class'      => 'navbar-nav mx-auto text-capital text-center pt-3',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new mobile_nav_walker(),
					)
        ); ?>

  </nav>
  <!-- Mobile menu ends -->
<?php
}else {

  ?>

  <!-- Desktop Menu Starts -->
  <nav class="navbar navbar-expand-lg header header--fixed hide-from-print shadow-sm navbar-light bg-white py-0">
            <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                      $logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full',['class'=>"d-lg-none"] );
                      $style = ' background-image: url("'.$logo_url[0].'"); background-size: contain; background-repeat:no-repeat; background-position:center center; min-height:50px;
                        min-width:235px; width:50%; vertical-align:middle; transition: all 0.2s linear;';
            ?>
            <?php if ( ! has_custom_logo() ) { ?>
              <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto d-lg-none " title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
            <?php } else { ?>
              <a rel='home' href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto d-lg-none" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"> <div id="logo" style='<?php echo $style; ?>'></div></a>
            <?php } ?>
   
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#desktopNavbar" aria-controls="desktopNavbar" aria-expanded="true" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-collapse collapse" id="desktopNavbar">
            <ul class="navbar-nav container-fluid p-0">
              <!-- The Left Menu goes here -->
              <?php 
                wp_nav_menu(
                  array(
                    'theme_location'  => 'left',
                    'container_class' => 'ml-lg-auto',
                    'container_id'    => 'nav-left',
                    'menu_class'      => 'navbar-nav', //Ul class
                    'menu_id'         => 'main-menu',
                    'fallback_cb'     => '',
                    'walker'          => new understrap_WP_Bootstrap_Navwalker(),
                  ) 
                );
              ?>
            
              <!-- Your site title as branding in the menu -->
              <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    $style = ' background-image: url("'.$logo_url[0].'"); background-size: contain; background-repeat:no-repeat; background-position:center center; min-height:50px;
                      min-width:235px; width:50%; vertical-align:middle; transition: all 0.2s linear;';
              ?>
              <?php if ( ! has_custom_logo() ) { ?>
                <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto d-none d-lg-inline-block " title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
              <?php } else { ?>
                <a rel='home' href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand mx-auto d-none d-lg-inline-block" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"> <div id="logo" style='<?php echo $style; ?>'></div></a>
              <?php } ?>
              
              <!-- The Right Menu goes here -->
              <?php 
                wp_nav_menu(
                  array(
                    'theme_location'  => 'right',
                    'container_class' => 'mr-lg-auto',
                    'container_id'    => 'nav-right',
                    'menu_class'      => 'navbar-nav', //Ul class
                    'menu_id'         => 'right-menu',
                    'fallback_cb'     => '',
                    'walker'          => new understrap_WP_Bootstrap_Navwalker(),
                  ) 
                );
              ?>
              
            </div>
  </nav>
  <!-- Desktop Menu Ends -->

  <!-- Search - trigger added from filter for right menu -->
  <div class="collapse clearfix" id="search_drawer">
    <div class="header-search d-flex justify-content-center">
      <form class="form-inline" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <input name="s" type="text" class="form-control form-control-lg border-0" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
            <button type="submit" class="btn bg-white form-control-lg"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
  </div>
  <div class="mb-5"></div>
<?php
}
?>


