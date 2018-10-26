<?php
/**
 * The template for displaying all single posts for Oraganising Unit Posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package understrap  
 */
get_header(); 
$container = get_theme_mod( 'understrap_container_type' );?>


<?php while ( have_posts() ) : the_post(); ?>
<div class="<?php echo esc_attr( $container ); ?> ">
<h2 class="brownline-before mb-4">Organising Unit</h2>
<div class="row">
    <figure class="col-md-3 col-12">
        <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive, w-100']);  ?>
    </figure>
    <div class="col-md-9 col-12 my-md-0 my-2">
       <article>
           
      
        <h2><?php the_title(); ?></h2>
       <p class="text-md-left text-justify">
       <?php echo get_the_content(); ?>
       </p>
        
        </article>
    </div>
</div>


<h3 class="h3 brownline-before my-4"> Contact Details</h3>
<div class="row">
    <?php
    $contactName = get_field('contact_person_name');
    $contactEmail = get_field('contact_email');
    $contactPhone = get_field('contact_phone');
    $contactFax = get_field('contact_fax_number');
    $unitAddress = get_field('contact_address');
    ?>
    <div class="col-12 p-0"></div>
    <table class="table table-borderless offset-md-3">
    <tbody>
    <tr>
    <th scope="row">Contact Name:</th>
      <td><?php echo($contactName); ?></td>
    </tr>
    <tr>
    <th scope="row">Phone Number:</th>
      <td><?php echo($contactPhone); ?></td>
    </tr>
    <tr>
    <th scope="row">Email Address:</th>
      <td><?php echo($contactEmail); ?></td>
    </tr>
    <?php if($contactFax):?><tr>
    <th scope="row">Fax Number:</th>
      <td><?php echo($contactName); ?></td>
    </tr>
    <?php endif;    ?>
    <tr>
    <th scope="row">Unit Address:</th>
      <td>
      <address>
      <?php echo($unitAddress); ?>
      </address>
      </td>
    </tr>
    </tbody>  
    </table>


</div>




<h3 class="h3 brownline-before my-4">Related Workshops</h3>
<div class="row">
    <div class="workshop-container" id="accordion">
    <?php 
         $currentOrganisingUnitPostID = get_the_ID();
    
        $workshops = queryPost_With_Dates(); //this function resturns the variable $workshops
            if($workshops):		 
            foreach($workshops as $post){
            $postId = $post->post_id;
            $organisingUnitPostObject = get_field('unit_name', $postId);
            if($organisingUnitPostObject):
                foreach($organisingUnitPostObject as $organiser){
                    
                    $organiserId = $organiser->ID;                    
                    if($organiserId == $currentOrganisingUnitPostID):
                        
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

                        
                        
                        ?></strong>
                    </div>
                </div>
            </div> 
        <?php 
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