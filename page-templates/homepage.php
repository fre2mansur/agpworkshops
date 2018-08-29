<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('sticky');
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-1" id="full-width-page-wrapper ">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

      			<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'col-xl-2 d-none d-xl-flex bg-white rounded navbar sidebar sidebarNav small  ',
						'container_id'    => 'navbarNavSidbar',
						'menu_class'      => 'sidebar-sticky',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new understrap_WP_Bootstrap_Navwalker(),

					)
				); ?>



				<main class="col-xl-10 col-lg-12 ml-sm-auto px-xl-3 d-flex " id="main" role="main">
          
     
        
					<div>
						<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>
					</div>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
