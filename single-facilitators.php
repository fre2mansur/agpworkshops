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
<div class="<?php echo esc_attr( $container ); ?>">
<div class="row">
<div class="col-3">
<?php the_post_thumbnail( 'medium', ['class' => 'img-responsive']);  ?>
</div>
<div class="col-9">
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
<?php endwhile; ?>
</div>
</div>
</div>
<?php 
get_footer(); ?>