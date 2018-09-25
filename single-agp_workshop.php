<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package understrap  
 */
get_header('agp'); ?>
<?php

/** Get Quick Details  */
$quick_data = get_field('quick_details');
$what = $quick_data['what'];
$where = $quick_data['where'];
$why = $quick_data['why'];
// $how = $quick_data['how'];

/** Get Workshop Intro and Description */
$brief_intro = get_field('brief_intro');
$workshop_description = get_field('workshop_description');

/** Get Workshop Schedule Type */
$get_the_schedule_type = get_field('select_the_schedule_type');
$number_of_days = get_field('number_of_days');
$number_of_weeks = get_field('number_of_weeks');

/** Get Workshop Daily Schedule */
$one_day_content = get_field('single_day');
$two_days_content = get_field('two_days_content');
$three_days_content = get_field('three_days_content');
$four_days_content = get_field('four_days_content');
$five_days_content = get_field('five_days_content');
$six_days_content = get_field('six_days_content');

$day_one_content = get_sub_field('day_one_content');
$day_two_content = get_field('day_two_content');
$day_three_content = get_field('day_three_content');
$day_four_content = get_field('day_four_content');
$day_five_content = get_field('day_five_content');
$day_six_content = get_field('day_six_content');

/** Get Workshop Weekly Schedule */
$two_weeks_content = get_field('two_weeks_content');
$three_weeks_content = get_field('three_weeks_content');
$four_weeks_content = get_field('four_weeks_content');

$week_one_content = get_field('week_one_content');
$week_two_content = get_field('week_two_content');
$week_three_content = get_field('week_three_content');
$week_four_content = get_field('week_four_content');

/** Get Payment Details */
$payment_group = 'payment_group';
$fees_with_accommodation = get_sub_field('fees_with_accommodation');
$payment_with_accommodation = get_sub_field('payment_with_accommodation');
$payment_details_with_accommodation = get_field('payment_details_with_accommodation');

$fees_without_accommodation = get_sub_field('fees_without_accommodation');
$payment_without_accommodation = get_sub_field('payment_without_accommodation');
$payment_details_without_accommodation = get_sub_field('payment_details_without_accommodation');
?>

<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="row">
				<div class="col-md-3">
					<h3>What</h3>
					<?php echo $what; ?>
				</div>
				<div class="col-md-3">
					<h3>Where</h3>
					<?php echo $where; ?>
				</div>
				<div class="col-md-3">
					<h3>why</h3>
					<?php echo $why; ?>
				</div>

			</div>

			<div class="row">
				<div class="col-md-9">
					<h1>Details</h1>
					<?php echo $brief_intro; ?>
					<?php echo $workshop_description; ?>

					
					<?php 
					$title = "<h1>Schedule</h1>";
					if($get_the_schedule_type == "daily"){
						$days = array('one_day','two_days','three_days','four_days','five_days','six_days');
						foreach($days as $day){
							if($day == $number_of_days && $day != 'one_day') {
								$day_content = get_field($day."_content");
								echo $title;
								$i = 1; foreach($day_content as $content) {
									if($content){
										echo "<h4>DAY ".$i++."</h4>";
										echo $content;
									}
								}
								
							}
						} 
					} else {
						$all_weeks = array('two_week','three_week','four_week');
						foreach($all_weeks as $week){
							if($week == $number_of_weeks) {
								$week_content = get_field($week."s_content");
								echo $title;
								$i = 1; foreach($week_content as $content) {
									if($content){
										echo "<h4>WEEK ".$i++."</h4>";
										echo $content;
									}
								}
							}
						}
					} ?>

					<h1>Facilitators</h1>
					<div class="row">
						<?php 
						$facilitators = get_field('facilitators');
						foreach($facilitators as $fac){?>
							<div class="col-md-3">
								<div>
								<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($fac->ID,'full');?>">
								</div>
								<?php echo $fac->post_title; ?>
							</div>
						<?php } ?>
					</div>

					<h1>Organizing Unit</h1>
					<div class="row">
						<?php $units = get_field('unit_name');
					 	foreach($units as $user){?>
							<div class="col-md-3">
								<div>
								<img class="img-fluid" src="<?php echo get_avatar_url($user->ID,'full');?>">
								</div>
								<?php echo $user->display_name; ?>
							</div>
						<?php } ?>
					</div>

				</div> <!--col-md-9-->
				<div class="col-md-3">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div>
				
			</div>
		<?php 

	// check for rows (parent repeater)
	if( have_rows($payment_group) ): ?>
		<div id="to-do-lists">
		<?php 

		// loop through rows (parent repeater)
		while( have_rows($payment_group) ): the_row(); ?>
			<div>
				<?php 

				// check for rows (sub repeater)
				if( have_rows('fees_with_accommodation') ): ?>
					<ul>
					<?php 

					// loop through rows (sub repeater)
					while( have_rows('fees_with_accommodation') ): the_row();

						// display each item as a list - with a class of completed ( if completed )
						?>
						<li> <?php the_sub_field('payment_with_accommodation'); ?> </li>
						<li> <?php the_sub_field('payment_details_with_accommodation'); ?> </li>
					<?php endwhile; ?>
					</ul>
				<?php endif; //if( get_sub_field('items') ): ?>
			</div>	

		<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
		</div>
	<?php endif; // if( get_field('to-do_lists') ): ?>

<?php endwhile; // end of the loop. ?>

	</div>





<?php 
get_footer(); ?>