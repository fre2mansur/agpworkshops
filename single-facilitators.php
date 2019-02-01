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
<h3 class="brownline-before mb-4 d-none d-md-block">Facilitator</h3>
<div class="row">
    <figure class="col-md-3 col-12 offset-md-1">
        <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive, w-100']);  ?>
    </figure>
    <div class="col-md-8 col-12 my-md-0 my-2">
       <article>
           
      
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
       <p class="text-md-left text-justify">
       <?php echo get_the_content(); ?>
       </p>
        
        </article>
    </div>
</div>

<h3 class="brownline-before my-4">Related Workshops</h3>
<div class="row">
    <div class="col-md-8 col-12 offset-md-4">
    <div class="workshop-container w-100" id="accordion">
    <?php 
         $currentFacilitatorId = get_the_ID();
    
        $workshops = agpf_workshop_query(); //this function resturns the variable $workshops
            if($workshops):		 
                foreach($workshops as $post){
                    $postId = $post->post_id;
                    $facilitatorPostObject = get_field('facilitators', $postId);
                    if($facilitatorPostObject):
                        foreach($facilitatorPostObject as $facilitator){
                            $facilitatorId = $facilitator->ID;
                            if($facilitatorId == $currentFacilitatorId):
                                agpf_related_loop($post);
                            endif;  
                        }
                    endif;
                }
    ?>


    </div>
    </div>
<?php else:
    echo "No Workshops Found";
endif;
?>
</div>
</div>
<?php
endwhile; ?>
<?php 
get_footer(); ?>