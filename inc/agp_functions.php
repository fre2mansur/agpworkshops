<?php
/**
 * Custom functions for custom post type Workshops.
 * all public function should start from the prefix "agpf_" it will identify the location of functions. 
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */
//

//Here you can change the param which passed in to the url used on all agpf function.
define('CATPARAM', 'wCat');
define('PAGEPARAM', 'wPage');
define('DATEPARAM', 'wDate');

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
    echo '<li class="nav-item menu-item"><a class="nav-link" href="'.add_query_arg( array(CATPARAM => 'All', PAGEPARAM => '1')  ).'">All<a/></li>';

    foreach ( $terms as $term ) {
        $termname = strtolower($term->term_id);
        $termname = str_replace(' ', '-', $termname);
        echo '<li class="nav-item menu-item"><a class="nav-link" href="'.add_query_arg( array(CATPARAM => $termname, PAGEPARAM => '1') ).'">'.$term->name.'</a></li>';
    }
}

// Custom query to get and sort all posts by Start and End Date
function agpf_workshop_query () {
	global $wpdb;
	return $wpdb->get_results(agpf_workshop_sql());
}

// Pagination for Workshops
function agpf_workshop_query_pagination () {
	global $wpdb;
	$items_per_page = 3;
    //$total = $wpdb->get_results(agpf_workshop_sql(1), OBJECT);
    $total = $wpdb->get_results(agpf_workshop_sql(1), OBJECT);
	$total = $total[0]->total;
	//var_dump($total[0]->total);
    
    //$page = get_query_var(PAGEPARAM, 1);
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
	$limit = 3;
	
	
	
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
    
    if(isset($_GET[DATEPARAM])) {
       // convert date formate to 20181220
        $where[] = "(start_date >= ".esc_sql($_GET[DATEPARAM]).")";
    }

	//Turn array to string
	//EX: WHERE wp.post_status = 'publish' AND (end_date > 20181219 OR end_date = 20181219) AND (wtt.term_taxonomy_id = 117
	$where = " WHERE " . implode(' AND ', $where);

	if($count) {
        $sql = "SELECT COUNT(post_id) as total ";
        $sql .= "FROM $customTable ct ";
        $sql .= "INNER JOIN $wpdb->posts wp ON (wp.ID = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_relationships wtr ON (wtr.object_id = wp.ID) ";
        $sql .= "INNER JOIN $wpdb->term_taxonomy wtt ON (wtt.term_taxonomy_id = wtr.term_taxonomy_id AND wtt.taxonomy='workshop_category') ";
        $sql .= "INNER JOIN $wpdb->terms wt ON (wt.term_id = wtt.term_id) $where ORDER BY %s ";
        return $wpdb->prepare($sql, 'ASC');
	} else {
        $sql = "SELECT *";
        $sql .= "FROM $customTable ct ";
        $sql .= "INNER JOIN $wpdb->posts wp ON (wp.ID = ct.post_id) ";
        $sql .= "INNER JOIN $wpdb->term_relationships wtr ON (wtr.object_id = wp.ID) ";
        $sql .= "INNER JOIN $wpdb->term_taxonomy wtt ON (wtt.term_taxonomy_id = wtr.term_taxonomy_id AND wtt.taxonomy='workshop_category') ";
        $sql .= "INNER JOIN $wpdb->terms wt ON (wt.term_id = wtt.term_id) $where ";
        $sql .= "ORDER BY ct.start_date ASC LIMIT  %d, %d";

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
?>