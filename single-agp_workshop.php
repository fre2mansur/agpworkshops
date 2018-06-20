<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package understrap  
 */
get_header('sticky'); ?>
<?php

/** Get Workshop Intro and Description */
$brief_intro = get_field('brief_intro');
$workshop_description = get_field('workshop_description');

/** Get Workshop Schedule Type */
$select_the_schedule_type = get_field('select_the_schedule_type');
$number_of_days = get_field('number_of_days');
$number_of_weeks = get_field('number_of_weeks');

/** Get Workshop Daily Schedule */
$single_day = get_field('single_day');
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

	<div id="primary">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

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

		</div><!-- #content -->
	</div><!-- #primary -->



<?php 
get_footer(); ?>