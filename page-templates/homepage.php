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
		if ( !wp_is_mobile() ) {
		homepageSliderGalleryImages_querry();
		if($homepageSliderGalleryImages){ ?>
		<div class="row">
			<div class="mb-5 d-none px-3 d-md-block w-100">
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
		<?php } 
		}?>
		<!--workshop portfolio-->
		<div class="workshops">
			<div class="h2 brownline-before">Latest Workshops</div>
			
			<ul id="filters" class="list-unstyled nav mb-3 ">
				<?php  $terms = get_terms('workshop_category',array("order"=>"ASC"));
				$data_filter = '';
				$dt = '';
				foreach($terms as $key=>$term){
						$data_filter .= ".".$term->term_id.", ";
						$dt=rtrim($data_filter,", ");
				}
				$count = count($terms);
					echo '<li class="nav-item menu-item p-0"><span data-filter="'.$dt.'" class="filter all nav-link">All</span></li>';
				if ( $count > 0 ){

					foreach ( $terms as $term ) {

						$termname = strtolower($term->term_id);
						$termname = str_replace(' ', '-', $termname);
						echo '<li class="nav-item menu-item"><span class="filter nav-link" data-filter=".'.$termname.'">'.$term->name.'</span</li>';
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
				card_loop($post);
			 } 
else: 
?>
<div class="row">
	<h3>No workshop found</h3>
</div>
<?php endif; ?>
				</div>
			</div> 
		 </div> 


<div class="row">
<a class="mx-auto" href="<?php echo get_post_type_archive_link( 'workshops' ); ?>"><button class="btn btn-outline-primary ">Show All Workshops</button></a>
</div>

</div>
<!-- Wrapper end -->

<?php get_footer(); ?>
