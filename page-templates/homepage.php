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
<?php


?>
<!--Gallery Starts-->

		<?php
		if ( !wp_is_mobile() ) {
		agpf_homepageSliderGalleryImages();
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
			<?php echo agpf_workshop_query_pagination(); ?>
			
			<ul id="filters" class="list-unstyled nav mb-3 pr-3">
				<?php echo agpf_category_filter(); ?>
				<?php echo agpf_month_filter(); ?>
			</ul>
			<div id="portfoliolist">
			<div class="workshop-container" id="accordion">
	<?php  
				
		if(isset($_GET['cpage'])) {
			$page = $_GET['cpage'];
		} else {
			$page = 1;
		}

		$workshops = agpf_workshop_query(); //this function returns the variable $workshops
		
		if($workshops):	
			foreach($workshops as $post){
				agpf_card_loop($post);	
				print_r(array_count_values($post));		
			 }  
			else: 
?>

<div class="row h-100">
	<h3>No workshop found</h3>
</div>
<?php endif; ?>
				</div>
			</div> 
		 </div> 


<div class="row">

<!-- <a class="mx-auto" href="<?php echo get_post_type_archive_link( 'workshops' ); ?>"><button class="btn btn-outline-primary ">Show All Workshops</button></a> -->
</div>

</div>
<!-- Wrapper end -->

<?php get_footer(); ?>
