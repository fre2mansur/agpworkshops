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


<?php while ( have_posts() ) : the_post(); ?>
<div class="<?php echo esc_attr( $container ); ?> ">
<h2 class="brownline-before mb-5">Facilitator</h2>
<div class="row">
    <div class="col-3">
        <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive']);  ?>
    </div>
    <div class="col-9">
        <h2><?php the_title(); ?></h2>
        <?php $units = get_field('unit_name');
                                    if($units):
                                    foreach($units as $unit){?>
                                        <div class="media mb-3">
                                            <div class="media-body">
                                                <small class="text-muted">
                                                <?php echo $unit->post_title; ?>
                                                </small>
                                            </div>
                                        </div>
                                    <?php } 
                                    endif;
                                ?>
        <?php the_content(); ?>
    </div>
</div>
<div class="row mt-5">
<h2 class="brownline-before mb-5">Related Workshops</h2>
</div>
</div>
<?php endwhile; ?>
<?php 
get_footer(); ?>