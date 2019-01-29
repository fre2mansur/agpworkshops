<?php
/**
 * Custom functions for custom post type Workshops.
 * all public function should start from the prefix "agpf_" it will identify the location of functions. 
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */
//

// Create a querry for homepage slider

function agpf_homepageSliderGalleryImages(){

	global $wpdb;
	$get_plugin_gallery_table = $wpdb->prefix . "advance_green_plugin_gallery";
	global $homepageSliderGalleryImages; 
	$homepageSliderGalleryImages = $wpdb->get_results( 
		$wpdb->prepare(
			"SELECT * FROM $get_plugin_gallery_table 
			ORDER BY RAND() LIMIT %d" 
			,array('12')),
			OBJECT_K);

	return $homepageSliderGalleryImages;
}



//Here you can change the param which passed in to the url used on all agpf function.
define('CATPARAM', 'wCat');
define('PAGEPARAM', 'wPage');
define('DATEPARAM', 'wDate');
define('ITEMSPERPAGE', '9');

//NOt working if register its redirect to other page
// function agpf_var_register($var) {
//     $var[] = CATPARAM;
//     $var[] = PAGEPARAM;
//     return $var;
// }
// add_filter('query_vars', 'agpf_var_register');

//Category list to filter the item.
function agpf_category_filter() {
    $terms = get_terms('workshop_category',array("order"=>"ASC")); 
    echo '<li class="nav-item menu-item"><a class="nav-link active" href="'.add_query_arg( array(CATPARAM => 'All', PAGEPARAM => '1')  ).'">All<a/></li>';

    foreach ( $terms as $term ) {
        $termname = strtolower($term->term_id);
        $termname = str_replace(' ', '-', $termname);
        echo '<li class="nav-item menu-item"><a class="nav-link" href="'.add_query_arg( array(CATPARAM => $termname, PAGEPARAM => '1') ).'">'.$term->name.'</a></li>';
	}
	
}

function agpf_month_filter() {
	$months = array('All'=>'all','Jan'=>'01', 'Feb'=>'02', 'Mar'=>'03', 'Apr'=>'04', 'May'=>'05', 'Jun'=>'06', 'Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	echo '<li class="nav-item menu-item ml-auto"> <a class="nav-link"> Filter by month </a> </li>
	<li class="nav-item menu-item">
	<select name="wDate" onchange="parent.window.location=this.value" class="form-control">
	</li>';
	foreach ($months as $name => $value) { ?>

		<option <?php if(@$_GET['wDate'] == $value) {echo "selected";} ?> value="?wDate=<?php echo $value; ?>"><?php echo $name; ?></option>


	<?php }
	echo '</select>';
}

// Custom query to get and sort all posts by Start and End Date
function agpf_workshop_query () {
	global $wpdb;
	return $wpdb->get_results(agpf_workshop_sql());
}

// Pagination for Workshops
function agpf_workshop_query_pagination () {
	global $wpdb;

	$items_per_page = ITEMSPERPAGE;

    //$total = $wpdb->get_results(agpf_workshop_sql(1), OBJECT);
	$total = $wpdb->get_results(agpf_workshop_sql(1), OBJECT);
	if($total){
		$total = $total[0]->total;
	} else {
		$total = '';
	}

    $page = 1;
    if(isset($_GET[PAGEPARAM])) {
        $page = esc_html($_GET[PAGEPARAM]);
    }
	return paginate_links( array(
		'base' => add_query_arg( PAGEPARAM, '%#%'),
		'format' => '',
		'prev_text' => __('&laquo;'),
		'next_text' => __('&raquo;'),
		'total' => ceil($total / $items_per_page),
		'current' => $page
	));
}

//Custom Sql for workshop cards. used in homepage and its pagination
function agpf_workshop_sql($count="") {
	global $wpdb;
    //$page = get_query_var(PAGEPARAM, 1);
    $page = 1;
    if(isset($_GET[PAGEPARAM])) {
        $page = esc_html($_GET[PAGEPARAM]);
    }

	$limit = ITEMSPERPAGE;

	
	
	
    $offset = ($page - 1) * $limit;
	$today = date('Ymd');
	$customTable = $wpdb->prefix.'workshop_dates';
	$postStatus = 'publish';


	//Adding Conditon In to Array
	$where = array();
	$where[] = "wp.post_status = '$postStatus'";
	$where[] = "(end_date > $today OR end_date = $today)";
	//Only add condition if category is filtered
	if(isset($_GET[CATPARAM]) && $_GET[CATPARAM] != "All") {
	$where[] = "(wtt.term_taxonomy_id = ".esc_sql($_GET[CATPARAM]).")";
    }
    


    if(isset($_GET[DATEPARAM]) && $_GET[DATEPARAM] != 'all') {
      	// convert date formate to 20181220
	   //$where[] = "(start_date >= 20190201)";


	 	$dateToMonth = date('Y').$_GET[DATEPARAM].'01';
		$where[] = "(start_date >= ".esc_sql($dateToMonth).")";
    }

	//Turn array to string
	//EX: WHERE wp.post_status = 'publish' AND (end_date > 20181219 OR end_date = 20181219) AND (wtt.term_taxonomy_id = 117
	$where = " WHERE " . implode(' AND ', $where);

	if($count) {
        $sql = "SELECT COUNT(post_id) as total ";
        $sql .= "FROM $customTable ct ";
        $sql .= "INNER JOIN $wpdb->posts wp ON (wp.ID = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_relationships wtr ON (wtr.object_id = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_taxonomy wtt ON (wtt.term_taxonomy_id = wtr.term_taxonomy_id AND wtt.taxonomy='workshop_category') ";
        $sql .= "INNER JOIN $wpdb->terms wt ON (wt.term_id = wtt.term_id) $where GROUP BY ct.start_date ORDER BY %s ";
        return $wpdb->prepare($sql, 'ASC');
	} else {
        $sql = "SELECT *";
        $sql .= "FROM $customTable ct ";
        $sql .= "INNER JOIN $wpdb->posts wp ON (wp.ID = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_relationships wtr ON (wtr.object_id = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_taxonomy wtt ON (wtt.term_taxonomy_id = wtr.term_taxonomy_id AND wtt.taxonomy='workshop_category') ";
        $sql .= "INNER JOIN $wpdb->terms wt ON (wt.term_id = wtt.term_id) $where ";
        $sql .= "GROUP BY ct.start_date ORDER BY ct.start_date ASC LIMIT  %d, %d";

        return $wpdb->prepare($sql, $offset, $limit);
	}
	
  

	
}

//Loop workshop cards. used in home page, facilitator, unit pages.
//$itemid = getting key value of foreach, its important.
function agpf_card_loop($itemId) {
	$postId = $itemId->post_id;
	$workshopStartDate = date('d-m-Y', strtotime($itemId->start_date));
	$workshopEndDate = date('d-m-Y', strtotime($itemId->end_date));
	$randomGenerator = mt_rand(123506, 9999999);
	$randPostIDsForAccordion = $postId * $randomGenerator; ?>

	<div class="workshop-card">
		<a class="d-block" href="#workshop_<?php echo $randPostIDsForAccordion;?>" data-toggle="collapse" aria-expanded="false" aria-controls="workshop_<?php echo $randPostIDsForAccordion?>">
		<?php
			$agp_Image_rows = get_field('shuffle_gallery');
			
			$agp_row_count = count($agp_Image_rows);
			static $iForRow = 0;
   			$iForRow++;
			if($agp_Image_rows && ($iForRow <= $agp_row_count)){
				
				
				$rand_row = $agp_Image_rows[$iForRow];

			
			$agp_rand_row_image = $rand_row['agp_workshop_gallery_images'];
			$agp_card_image = wp_get_attachment_image_src( $agp_rand_row_image, 'medium' );
			// 
			?>
			<figure class="figure w-100">
				<img src="<?php echo $agp_card_image[0] ; ?>" alt="<?php echo get_the_title($agp_card_image); ?>" class="card-img-top"/>	
			</figure>
	  		 <?php } else { the_post_thumbnail('medium', ['class' =>"card-img-top"]); } ?>
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
			<h6 class="card-subtitle mb-2 pb-2 text-muted"><?php the_terms( $postId, 'workshop_category' ); ?></h6>
			<div class="collapse" id="workshop_<?php echo $randPostIDsForAccordion; ?>"  data-parent="#accordion">
				<p class="card-text"><?php echo wp_strip_all_tags(get_field('brief_intro'));?></p>
				<div class="d-flex mb-3 justify-content-center">
					<a class="btn btn-outline-success w-100" href="<?php
					 echo esc_url(add_query_arg(
						array(
							'startDate' => $workshopStartDate,
							
						),
						the_permalink())
						 );?>">
						 Know more
						 </a>
					
				</div>     
			</div>
		</div>
		<hr class="p-0 m-0 ">
		<div class="footer d-flex justify-content-between m-0 px-4">
			<div class="py-3">
				<span class="mr-auto d-block d-lg-inline-block ">Starts - </span>
				<strong class= "d-block d-lg-inline-block ">
					<?php echo $workshopStartDate;?></strong>
			</div>
			<span class="line border-card mx-auto"></span>
			<div class="py-3 pl-2">
				<span class="mr-auto d-block d-lg-inline-block ">Ends -</span>
				<strong class= "d-block d-lg-inline-block ">
					<?php echo $workshopEndDate;?></strong>
			</div>
		</div>
	</div> 

<?php }
function agpf_related_loop($itemId) {
	$postId = $itemId->post_id;
	$workshopStartDate = date('d-m-Y', strtotime($itemId->start_date));
	$workshopEndDate = date('d-m-Y', strtotime($itemId->end_date));
	?>

  	<div class="workshop-card">
	  <?php
			$rows = get_field('shuffle_gallery');
			if($rows){ 
				$iForRow = 0; 
				$rand_row = $rows[$iForRow];
				$agp_rand_row_image = $rand_row['agp_workshop_gallery_images'];
				$agp_card_image = wp_get_attachment_image_src( $agp_rand_row_image, 'medium' );
				$iForRow++;
		?>
			<figure class="figure w-100">
				<img src="<?php echo $agp_card_image[0] ; ?>" alt="<?php echo get_the_title($agp_card_image); ?>" class="card-img-top"/>	
			</figure>
		  <?php } 
		  else {
			  the_post_thumbnail('medium', ['class' =>"card-img-top"]); 
		  }?>
		<div class="card-body">
			<div class="d-flex justify-content-between header">
				<h5 class="card-title"><?php the_title()?></h5>
			</div> 
			<?php 	$categories = get_the_terms( $postId, 'workshop_category'); 
					foreach ( $categories as $category){
						$categoryName = $category->slug;
					}
			?>
			<h6 class="card-subtitle mb-2 pb-2 text-muted"><?php the_terms( $postId, 'workshop_category' ); ?></h6>
			<p class="card-text"><?php echo wp_strip_all_tags(get_field('brief_intro'));?></p>
			<div class="d-flex mb-3 justify-content-center">
				<a class="btn btn-outline-success w-100" href="<?php
					 echo esc_url(add_query_arg(
						array(
							'startDate' => $workshopStartDate,
						), the_permalink()) );?>"> Know more
				</a>
			</div>
			<hr class="p-0 m-0 ">
			<div class="footer d-flex justify-content-between m-0 px-4">
				<div class="">
					<span class="mr-auto d-block d-lg-inline-block ">Starts - </span>
					<strong class= "d-block d-lg-inline-block ">
						<?php echo $workshopStartDate;?></strong>
				</div>
				<span class="line border-card mx-auto"></span>
				<div class="pl-2">
					<span class="mr-auto d-block d-lg-inline-block ">Ends -</span>
					<strong class= "d-block d-lg-inline-block ">
						<?php echo $workshopEndDate;?></strong>
				</div>
			</div>
     
    </div>

</div>

<?php }
function my_acf_input_admin_footer() { ?>
	<script type="text/javascript">
		(function($) {
			var start_date_key = 'field_5bb496b0c69b3'; // the field key of the start date
			var end_date_key = 'field_5bb4b62297bdf'; // the field key of the end date
			
			if (typeof(acf) != 'undefined') {
			acf.add_action('date_picker_init', function($input, args, $field) {
				var key = $input.closest('.acf-field').data('key');// get the field key for this field
				if (key == start_date_key) { // see if it's the start date field
					$input.datepicker().on('input change select', function(e) { // add action to start date field datepicker
						var date = jQuery(this).datepicker('getDate'); // get the selected date
						jQuery('[data-key="'+end_date_key+'"] input.hasDatepicker').datepicker( "option", "minDate", date);
					});
				}
				return args;
			});
			}
		
		})(jQuery);	
	</script>
<?php }
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

//Admin Menu name changed posts to blog
function blog_change_post_object() {
    global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->menu_name = 'Blog';
    $labels->name = 'Blog';
	$labels->singular_name = 'Blog';
	$labels->name_admin_bar = 'Blog';
}
add_action( 'init', 'blog_change_post_object' );

 
?>