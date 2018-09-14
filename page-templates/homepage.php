<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('agp');
$container = get_theme_mod( 'understrap_container_type' );
global $wpdb;
$get_plugin_gallery_table = $wpdb->prefix . "advance_green_plugin_table_images";
$gallery = $wpdb->get_results( "SELECT * FROM $get_plugin_gallery_table", OBJECT_K );
?>
<div class="wrapper pt-1" id="full-width-page-wrapper ">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<?php if($gallery){ ?>
		<div class="row">
			<div class="d-none px-3 d-md-block w-100">
				<div class="no-radius">
					<div class="card-group text-center">
						<?php foreach($gallery as $image) { ?>
							<div class="card bg-dark text-white">
								<img src="<?php echo $image->Image; ?>" alt="" class="card-img">
								<div class="card-img-overlay">
									<div class="card-img-overlay h-100 d-flex flex-column justify-content-center align-items-center">
										<h6 class="card-title"><?php echo $image->Title; ?></h6>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
    	</div><!-- .row end -->
		<?php } ?>
	</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>
