<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('agp');
$container = get_theme_mod( 'understrap_container_type' );
global $wpdb;
$get_plugin_gallery_table = $wpdb->prefix . "advance_green_plugin_gallery";
$gallery = $wpdb->get_results( "SELECT * FROM $get_plugin_gallery_table ORDER BY RAND() LIMIT 12", OBJECT_K);
?>

<div class="<?php echo esc_attr( $container ); ?>" id="content">
<!--Gallery Starts-->
		<?php if($gallery){ ?>
		<div class="row">
			<div class="d-none px-3 d-md-block w-100">
				<div class="no-radius">
					<div class="card-group text-center">
						<?php foreach($gallery as $image) { ?>
							<div class="card bg-dark text-white">
								<img src="<?php echo $image->src; ?>" alt="" class="card-img">
								<div class="card-img-overlay">
									<div class="card-img-overlay h-100 d-flex flex-column justify-content-center align-items-center">
										<h6 class="card-title"><?php echo $image->title; ?></h6>
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
		<!-- <div class="workshops">
			<h2>Latest Workshops</h2>
			
			<ul id="filters" class="list-unstyled nav m-3">
				<?php  $terms = get_terms('workshop_category',array("order"=>"ASC"));
				$data_filter = '';
				$dt = '';
				foreach($terms as $key=>$term){
						$data_filter .= ".".$term->term_id.", ";
						$dt=rtrim($data_filter,", ");
				}
				$count = count($terms);
					echo '<li class="nav-item"><span data-filter="'.$dt.'" class="filter all nav-link">All</span></li>';
				if ( $count > 0 ){

					foreach ( $terms as $term ) {

						$termname = strtolower($term->term_id);
						$termname = str_replace(' ', '-', $termname);
						echo '<li class="nav-item"><span class="filter nav-link" data-filter=".'.$termname.'">'.$term->name.'</span</li>';
					}
				} ?>
			</ul>
			<div id="portfoliolist">  -->
			<div class="card-columns my-5" id="accordion">
				<?php  global $post;
				$args = array( 
          'post_type' => 'agp_workshop',
          'posts_per_page' => '10',
          'post_status' => 'publish' );

        $workshop_query = null;  
				$workshop_query = new WP_Query( $args );
				while ( $workshop_query->have_posts() ) : $workshop_query->the_post(); 
					$terms = get_the_terms( $post->ID, 'workshop_category' );   
			        if ( $terms && ! is_wp_error( $terms ) ) : 
						$links = array();
						foreach ( $terms as $term ) {
							$links[] = $term->term_id;
						}
						$tax_links = join( " ", str_replace(' ', '-', $links));          
						$tax = strtolower($tax_links);
					else :  
					$tax = '';                  
					endif; 
					?>
					<div class="card <?php echo $tax; ?>" data-cat="<?php echo $tax;?>">
						<img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="" >
						<div class="card-body">
							<a class="decoration-none" data-toggle="collapse" href="#workshop_<?php echo the_ID(); ?>" role="button" aria-expanded="false" aria-controls="workshop_<?php echo the_ID(); ?>" >
								<div class="d-flex justify-content-between header">
									<h5 class="card-title"><?php the_title()?></h5>
									<a class="collapsed" data-toggle="collapse" href="#workshop_<?php echo the_ID(); ?>" role="button" name="header" aria-expanded="false" aria-controls="workshop_<?php echo the_ID(); ?>" >
										<span class="arrow"></span>
									</a>
								</div> 
							</a>
							<h6 class="card-subtitle text-muted mb-2 pb-2"><?php the_terms( $post->ID, 'workshop_category' ); ?></h6>
							<div class="collapse my-2" id="workshop_<?php echo the_ID(); ?>"  data-parent="#accordion">
								<p class="card-text"><?php echo wp_strip_all_tags(get_field('brief_intro'));?></p>
								<div class="d-flex justify-content-start mb-3">
									<a href="<?php the_permalink(); ?>">Know more</a>
									<a href="#" class="ml-5">Register now</a>
								</div>     
							</div>
							<hr class="p-0 m-0 mt-2">
							<div class="footer d-flex justify-content-between m-0">
							<?php $date = get_field('date_selector'); ?>
								<div class="py-3">
									<span class="mr-auto">Starts - </span>
									<strong><?php echo $date['start_date'];?></strong>
								</div>
								<span class="line border border-gray mx-auto"></span>
								<div class="py-3 pl-2">
									<span class="mr-auto">Ends -</span>
									<strong><?php echo $date['end_date'];?></strong>
								</div>
							</div>
						</div>
					</div> 
				<?php endwhile;?>
				</div>
        </div>
			<!-- </div> -->
		<!-- </div> -->

<!-- Testing masonry layout without portfolio -->
<div class="container">
<div class="card-columns" id="accordion">
      
      <div class="card" id="headingOne">
     <img src="https://picsum.photos/320/220" alt="" class="card-img-top">
      <div class="card-body">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
        <div class="d-flex justify-content-between header">
         <h5 class="card-title">Exploring Auroville Architecture</h5>
         <a class="collapsed" data-toggle="collapse" href="#collapseExample" role="button" name="header" aria-expanded="false" aria-controls="collapseExample" >
          <span class="arrow"></span>
         </a>
        </div> 
        </a>
         <h6 class="card-subtitle text-muted mb-2 pb-2">Building and architecture</h6>
         <div class="collapse my-2" id="collapseExample" aria-labelledby="headingOne" data-parent="#accordion">
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>     
         </div>
        <hr class="p-0 m-0 mt-2">
    <div class="footer d-flex justify-content-between">
      <div class="py-3">
      <span class="mr-auto">Starts - </span>
      <strong>24 OCT 2018</strong>
      </div>
      <span class="line border border-gray mx-auto"></span>
      <div class="py-3 pl-2">
      <span class="mr-auto">Ends -</span>
      <strong>30 OCT 2018</strong>
      </div>
    </div>
  </div>
   </div>
      <div class="card" id="headingTwo">
     <img src="https://picsum.photos/320/320" alt="" class="card-img-top">
      <div class="card-body pb-1">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" >
        <div class="d-flex justify-content-between header">
          <h5 class="card-title">Earth and Bamboo</h5>
          <a class="collapsed" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" >
            <span class="arrow"></span>
          </a>
        </div>  
        </a>
        <h6 class="card-subtitle mb-2 text-muted pb-2">Building and architecture</h6>
        <div class="collapse my-2" id="collapseExample2" aria-labelledby="headingTwo" data-parent="#accordion">
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>
          </div>
       <hr class="p-0 m-0 mt-2">
          <div class="footer d-flex justify-content-between">
            <div class="py-3">
            <span class="mr-auto">Starts - </span>
            <strong>24 OCT 2018</strong>
            </div>
            <span class="line border border-gray mx-auto"></span>
            <div class="py-3 pl-2">
            <span class="mr-auto">Ends -</span>
            <strong>30 OCT 2018</strong>
            </div>
          </div>
    
      </div>
  </div>
      <div class="card"  id="headingThree">
     <img src="https://picsum.photos/320/240" alt="" class="card-img-top">
      <div class="card-body pb-1">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
          <div class="d-flex justify-content-between header">
          <h5 class="card-title">Some other workshop name</h5>  
          <a class="collapsed" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3"><span class="arrow"></span>
          </a>
          </div>
        </a>
        <h6 class="card-subtitle mb-2 text-muted pb-2">Art & Craft</h6>
        <div class="collapse my-2" id="collapseExample3" aria-labelledby="headingThree" data-parent="#accordion">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>
         </div>
         <hr class="p-0 m-0 mt-2">
          <div class="footer d-flex justify-content-between">
            <div class="py-3">
            <span class="mr-auto">Starts - </span>
            <strong>24 OCT 2018</strong>
            </div>
            <span class="line border border-gray mx-auto"></span>
            <div class="py-3 pl-2">
            <span class="mr-auto">Ends -</span>
            <strong>30 OCT 2018</strong>
            </div>
          </div>    
  </div>
   </div>
      <div class="card "  id="headingFour">
     <img src="https://picsum.photos/290/240" alt="" class="card-img-top">
      <div class="card-body pb-1">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
          <div class="d-flex justify-content-between header">
          <h5 class="card-title">Some other workshop name</h5>  
          <a class="collapsed" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4"><span class="arrow"></span>
          </a>
          </div>
        </a>
        <h6 class="card-subtitle mb-2 text-muted pb-2">Art & Craft</h6>
        <div class="collapse my-2" id="collapseExample4" aria-labelledby="headingThree" data-parent="#accordion">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>
         </div>
         <hr class="p-0 m-0 mt-2">
          <div class="footer d-flex justify-content-between">
            <div class="py-3">
            <span class="mr-auto">Starts - </span>
            <strong>24 OCT 2018</strong>
            </div>
            <span class="line border border-gray mx-auto"></span>
            <div class="py-3 pl-2">
            <span class="mr-auto">Ends -</span>
            <strong>30 OCT 2018</strong>
            </div>
          </div>    
  </div>
   </div>
       <div class="card"  id="headingFive">
     <img src="https://picsum.photos/320/350" alt="" class="card-img-top">
      <div class="card-body pb-1">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
          <div class="d-flex justify-content-between header">
          <h5 class="card-title">Some other workshop name</h5>  
          <a class="collapsed" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5"><span class="arrow"></span>
          </a>
          </div>
        </a>
        <h6 class="card-subtitle mb-2 text-muted pb-2">Art & Craft</h6>
        <div class="collapse my-2" id="collapseExample5" aria-labelledby="headingThree" data-parent="#accordion">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>
         </div>
         <hr class="p-0 m-0 mt-2">
          <div class="footer d-flex justify-content-between">
            <div class="py-3">
            <span class="mr-auto">Starts - </span>
            <strong>24 OCT 2018</strong>
            </div>
            <span class="line border border-gray mx-auto"></span>
            <div class="py-3 pl-2">
            <span class="mr-auto">Ends -</span>
            <strong>30 OCT 2018</strong>
            </div>
          </div>    
  </div>
   </div>
       <div class="card"  id="headingSix">
     <img src="https://picsum.photos/240/240" alt="" class="card-img-top">
      <div class="card-body pb-1">
        <a class="decoration-none" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
          <div class="d-flex justify-content-between header">
          <h5 class="card-title">Some other workshop name</h5>  
          <a class="collapsed" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6"><span class="arrow"></span>
          </a>
          </div>
        </a>
        <h6 class="card-subtitle mb-2 text-muted pb-2">Art & Craft</h6>
        <div class="collapse my-2" id="collapseExample6" aria-labelledby="headingThree" data-parent="#accordion">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <div class="d-flex justify-content-start mb-3">
           <a href="#">Know more</a>
           <a href="#" class="ml-5">Register now</a>
           </div>
         </div>
         <hr class="p-0 m-0 mt-2">
          <div class="footer d-flex justify-content-between">
            <div class="py-3">
            <span class="mr-auto">Starts - </span>
            <strong>24 OCT 2018</strong>
            </div>
            <span class="line border border-gray mx-auto"></span>
            <div class="py-3 pl-2">
            <span class="mr-auto">Ends -</span>
            <strong>30 OCT 2018</strong>
            </div>
          </div>    
  </div>
   </div>
      
    </div> 

		<!--workshop ends-->

		

	
	</div><!-- Container end -->
</div>
</div>

<!-- Wrapper end -->
<?php get_footer('agp'); ?>
