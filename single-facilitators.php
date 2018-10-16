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
<div class="workshop-container" id="accordion">
<?php 
the_ID();
	$workshops = queryPost_With_Dates(); //this function resturns the variable $workshops
		if($workshops):		 
        foreach($workshops as $post){
          $postId = $post->post_id;
          $facilitatorPostObject = get_field('facilitators', $postId);
          print_r($facilitatorPostObject);
          $workshopStartDate = $post->start_date;
          $workshopEndDate = $post->end_date;
          
                  $randomGenerator = mt_rand(123506, 9999999);
                  $randPostIDsForAccordion = $postId * $randomGenerator;
          
          ?>
          <div class="workshop-card" data-cat="">
              <a class="d-block" href="#workshop_<?php echo $randPostIDsForAccordion;?>" data-toggle="collapse" aria-expanded="false" aria-controls="workshop_<?php echo $randPostIDsForAccordion?>">
              <?php the_post_thumbnail('medium', ['class' =>"card-img-top"]); ?>
              </a>
              <div class="card-body pb-0">
                  <a class="decoration-none" data-toggle="collapse" href="#workshop_<?php echo $randPostIDsForAccordion; ?>" role="button" aria-expanded="false" aria-controls="workshop_<?php echo $randPostIDsForAccordion; ?>" >
                      <div class="d-flex justify-content-between header">
                          <h5 class="card-title"><?php the_title()?></h5>
                          <a class="collapsed" data-toggle="collapse" href="#workshop_<?php echo $randPostIDsForAccordion; ?>" role="button" name="header" aria-expanded="false" aria-controls="workshop_<?php echo $randPostIDsForAccordion; ?>" >
                              <span class="arrow"></span>
                          </a>
                      </div> 
                  </a>
                  <?php $categories = get_the_terms( $postId, 'workshop_category'); 
                  foreach ( $categories as $category){
                          $categoryName = $category->slug;
                   }?>
                  <h6 class="card-subtitle mb-2 pb-2 text-muted ?>"><?php the_terms( $postId, 'workshop_category' ); ?></h6>
                  <div class="collapse" id="workshop_<?php echo $randPostIDsForAccordion; ?>"  data-parent="#accordion">
                      <p class="card-text"><?php echo wp_strip_all_tags(get_field('brief_intro'));?></p>
                      <div class="d-flex mb-3 justify-content-between">
                          <a class="btn btn-outline-success d-inline-flex" href="<?php the_permalink(); ?>">Know more</a>
                          <a class="btn btn-outline-info d-inline-flex" href="#" >Register now</a>
                      </div>     
                  </div>
              </div>
              <hr class="p-0 m-0 ">
              <div class="footer d-flex justify-content-between m-0 px-4">
              <?php ?>
                  <div class="py-3">
                      <span class="mr-auto d-block d-lg-inline-block ">Starts - </span>
                      <strong class= "d-block d-lg-inline-block "><?php
                          

                          
                          echo date('d-m-Y', strtotime($workshopStartDate));
                           
                          
                      ?></strong>
                  </div>
                  <span class="line border-card mx-auto"></span>
                  <div class="py-3 pl-2">
                      <span class="mr-auto d-block d-lg-inline-block ">Ends -</span>
                      <strong class= "d-block d-lg-inline-block "><?php
                      
                          echo date('d-m-Y', strtotime($workshopEndDate));
                      

                      // $get_the_schedule_type = get_field('select_the_schedule_type');
                      // $number_of_weeks = get_field('number_of_weeks');
                      // if($get_the_schedule_type == "daily"){				
                                                              
                      // }
                      
                      
                      ?></strong>
                  </div>
              </div>
          </div> 
      <?php 

}?>
</div>
</div>
<?php else:
    echo "No Workshops Found";
endif;
?>
</div>
<?php
endwhile; ?>
<?php 
get_footer(); ?>