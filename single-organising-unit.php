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
<h3 class="brownline-before mb-4 d-none d-md-block">Unit</h3>

<div class="row">
    <!-- <figure class="col-md-3 col-12 offset-md-1">
        <?php // the_post_thumbnail( 'medium', ['class' => 'img-responsive, w-100']);  ?>
    </figure> -->
    <div class="col-md-8 col-12 offset-md-3">
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
    $contactPhone = get_field('contact_phone_number');
    $contactFax = get_field('contact_fax_number');
    $unitAddress = get_field('contact_address');
    $unitWebsite = get_field('unit_website_url');
    ?>
    <div class="col-md-8 col-12 offset-md-3">
    <table class="table table-borderless">
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
    <?php if($contactFax):?>
    <tr>
    <th scope="row">Fax Number:</th>
      <td><?php echo($contactName); ?></td>
    </tr>
    <?php endif;    ?>
    <tr>
    <th scope="row">Unit Address:</th>
      <td><?php echo($unitAddress); ?></td>
    </tr>
    <?php if($unitWebsite):?>
    <tr>
    <th scope="row">Website:</th>
      <td><?php echo('<a href='.$unitWebsite.'>'.$unitWebsite.'</a>'); ?></td>
    </tr>
    <?php endif;    ?>
    </tbody>  
    </table>
    </div>

</div>




<h3 class="h3 brownline-before my-4">Related Workshops</h3>
<div class="row">
    <div class="col-md-8 col-12 offset-md-3">
        <div class="scrollable-content">
        <?php 
            $currentOrganisingUnitPostID = get_the_ID();
            $workshops = agpf_workshop_query(); //this function resturns the variable $workshops
            if($workshops):		 
                foreach($workshops as $post){
                    $postId = $post->post_id;
                    $organisingUnitPostObject = get_field('unit_name', $postId);
                    if($organisingUnitPostObject):
                        foreach($organisingUnitPostObject as $organiser){
                            
                            $organiserId = $organiser->ID;                    
                            if($organiserId == $currentOrganisingUnitPostID):
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