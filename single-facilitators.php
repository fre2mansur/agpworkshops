<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package understrap  
 */
get_header(); 
$container = get_theme_mod( 'understrap_container_type' );?>

<h2 class="brownline-before mb-5">Facilitator</h2>

<?php while ( have_posts() ) : the_post(); ?>
<div class="<?php echo esc_attr( $container ); ?> ">
<div class="row">
<div class="col-3">
<?php the_post_thumbnail( 'medium', ['class' => 'img-responsive']);  ?>
</div>
<div class="col-9">
<h2><?php the_title(); ?></h2>
<?php $units = get_field('unit_name');
							foreach($units as $unit){?>
								<div class="media mb-3">
									<div class="media-body">
                                        <small class="text-muted">
                                        <?php echo $unit->post_title; ?>
                                        </small>
                                    </div>
								</div>
							<?php } 
						?>
<?php the_content(); ?>
<?php endwhile; ?>
</div>
</div>
</div>
<?php 
get_footer(); ?>