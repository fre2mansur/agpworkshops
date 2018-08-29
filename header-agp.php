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

  <!-- Mobile Menu   -->
  <nav class="mobile-menu-parent sticky-top navbar-default shadow bg-white flex-row d-block d-md-none" id="header-menu">
    <div class="d-flex justify-content-around align-items-center p-2 w-100" >  
    <button class="menu-btn navbar-toggler d-inline-flex px-1 d-md-none" type="button" onclick="" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30" >
  <path
        class="line top"
        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
  <path
        class="line middle"
        d="m 70,50 h -40" />
  <path
        class="line bottom"
        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
</svg>
 </button>
      
      <div class="logo"></a></div>
      
    <button class="menu-btn navbar-toggler d-inline-flex px-1 justify-content-end d-md-none" type="button"  onclick="toggleMenu();" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation" >
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="30">
  <path
        class="line top"
        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
  <path
        class="line middle"
        d="m 70,50 h -40" />
  <path
        class="line bottom"
        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
</svg>
      </button>   
    </div>
<!--     <span class="mobile-search container">
          
      <input type="text" name="search" placeholder="Search" id="search-box" class="">
           
    </span> -->

  <!-- The WordPress Menu goes here -->
  <?php wp_nav_menu(
					array(
						'theme_location'  => 'mobile',
						'container_class' => 'container-fluid bg-white collapse navbar-collapse d-md-none',
						'container_id'    => 'mobilemenu',
						'menu_class'      => 'navbar-nav mx-auto text-capital text-center pt-3',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new mobile_nav_walker(),
					)
        ); ?>
        

    <!-- <div class="container-fluid bg-white collapse navbar-collapse d-md-none " id="mobilemenu">
      <ul class="navbar-nav mx-auto text-capital text-center pt-3 ">
        <li class="nav-item dropdown-item"><a href="" class="nav-link">about us</a></li>
        <li class="nav-item dropdown-item"><a href="" class="nav-link">blog</a></li>
        <li class="nav-item dropdown-item"><a href="" class="nav-link">faq</a></li>
        <li class="nav-item active" >
          <a href="#" class="nav-link side-arrow " data-toggle="collapseDropDown"  data-target=".collapseDropDown"  data-text="CollapseDropDown"> <span data-toggle="collapseDropDown"  data-target=".collapseDropDown"  data-text="CollapseDropDown">Workshop</span></a>
          <div id="collapseOne" class="collapseDropDown">
            <ul class="navbar-nav dropdown-menu mx-auto text-capital text-center">
                <li class="nav-item dropdown-item"><a href="" class="nav-link">Art & Craft</a></li>
              <li class="nav-item dropdown-item"><a href="" class="nav-link">Building & Architecture</a></li>
              <li class="nav-item dropdown-item"><a href="" class="nav-link">Energy</a></li>
              <li class="nav-item dropdown-item"><a href="" class="nav-link">Sustainability</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item dropdown-item"><a href="" class="nav-link">contact us</a></li>
      </ul>
    </div> -->
  </nav>
  
  <!-- Mobile menu ends -->
  <!-- Desktop Menu Starts -->
  <nav class="navbar d-none d-md-flex sticky-top shadow-sm navbar-light bg-white py-0">
    <div class="container">
    <div class="" id="nav-left">
      <ul class="nav">
          <li class="nav-item px-lg-2">
              <a class="nav-link " href="#">About Us</a>
          </li>
          <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">FAQ</a>
          </li>
      </ul>
    </div>
    
    <a class="navbar-brand mx-auto" href="#"><div id="logo" class="logo"></div></a>
    
    <div class="" id="nav-right">
      <ul class="nav ml-auto">
          <li class="nav-item px-lg-2 dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Workshops
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Arts & Craft</a>
          <a class="dropdown-item" href="#">Building & Architecture</a>
          <a class="dropdown-item" href="#">Energy</a>
          <a class="dropdown-item" href="#">Sustainability</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Others</a>
        </div>
          </li>
        <li class="nav-item px-lg-2">
              <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item px-lg-2">
            <a class="nav-link" href="#"><span class="fa fa-search"></span></a>
        </li>
      </ul>
    </div>
    </div>
    <!-- Mobile -->
</nav>
<!-- Desktop Menu Ends -->
<!--   </main> -->