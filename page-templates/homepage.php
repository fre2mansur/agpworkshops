<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?>">

<!--Gallery Starts-->
		<?php
		homepageSliderGalleryImages_querry();
		if($homepageSliderGalleryImages){ ?>
		<div class="row ">
			<div class="margin-negative-60 margin-bottom-60 d-none px-3 d-md-block w-100">
				<div class="no-radius">
					<div class="card-group text-center">
						<?php foreach($homepageSliderGalleryImages as $image) { ?>
							<div class="card bg-dark text-white">
								<?php $attachmentImage = $image->attachment_id; echo wp_get_attachment_image($attachmentImage, "medium","", ['class' =>"card-img"]) ?>
								<div class="card-img-overlay">
									<div class="card-img-overlay h-100 d-flex flex-column justify-content-center align-items-center">
										<h6 class="card-title"><?php //echo $image->title; ?></h6>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
    	</div><!-- .row end -->
		<?php } ?>
		<!--workshop portfolio-->
		<div class="workshops">
			<div class="h2 brownline-before">Latest Workshops</div>
			
			<ul id="filters" class="list-unstyled nav ">
				<?php  $terms = get_terms('workshop_category',array("order"=>"ASC"));
				$data_filter = '';
				$dt = '';
				foreach($terms as $key=>$term){
						$data_filter .= ".".$term->term_id.", ";
						$dt=rtrim($data_filter,", ");
				}
				$count = count($terms);
					echo '<li class="nav-item p-0"><span data-filter="'.$dt.'" class="filter all nav-link">All</span></li>';
				if ( $count > 0 ){

					foreach ( $terms as $term ) {

						$termname = strtolower($term->term_id);
						$termname = str_replace(' ', '-', $termname);
						echo '<li class="nav-item"><span class="filter nav-link" data-filter=".'.$termname.'">'.$term->name.'</span</li>';
					}
				} ?>
			</ul>
			<div id="portfoliolist">
			<div class="workshop-container" id="accordion">
				<?php  
				
				
		// 		$args = array( 
        //   'post_type' => 'agp_workshop',
		//   'posts_per_page' => 9,
		//   'meta_query' => array(
		// 	  'relation' => 'AND',
		// 	  array(
		// 		  'key' => 'start_date_wp',
		// 		  'compare' => '>=',
		// 		  'value'=> $today

		// 	  ),
		// 	  array(
		// 		  'key' => 'end_date_wp',
		// 		  'compare' => '>=',
		// 		  'value' => $today
		// 	  )
		//   ),
		//   'orderby' => 'meta_value',
		//   'order' => 'ASC',
		  
        //   'post_status' => 'publish' );

		$workshops = queryPost_With_Dates(); //this function resturns the variable $workshops
		if($workshops):	
				 
				  foreach($workshops as $post){
					$postId = $post->post_id;
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
							<h6 class="card-subtitle mb-2 pb-2 catColor-<?php echo $categoryName; ?>"><?php the_terms( $postId, 'workshop_category' ); ?></h6>
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
							<span class="line border border-gray mx-auto"></span>
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
<div class="row">
<button class="btn btn-outline-primary mx-auto">load more</button>
</div>
<?php
else: 
?>
<div class="row">
	<h3>No workshop found</h3>
</div>
<?php endif; ?>
				</div>
			</div> 
		 </div> 



</div>
<!-- Wrapper end -->

<?php get_footer(); ?>
