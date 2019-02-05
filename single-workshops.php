<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package understrap  
 */
get_header(); ?>
<?php
$container = get_theme_mod( 'understrap_container_type' );
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

?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="<?php echo esc_attr( $container ); ?> workshop-single ">
	
	<!-- What where we -->
	<div class="who-where-what">
		<h2 class="brownline-before mb-5"><?php the_title(); ?></h2>
		
			<div class="row p-0 col-11 mx-auto d-flex">
				<div class="col-lg-4">
					<h3>What</h3>
					<p><?php echo $what; ?></p>
				</div>
				<div class="col-lg-4">
					<h3>Where</h3>
					<p><?php echo $where; ?></p>
				</div>
				<div class="col-lg-4">
					<h3>Why</h3>
					<p><?php echo $why; ?></p>
				</div>
			</div>
		
	</div>


	<!-- Fluid banner -->
	<figure class="single-banner my-5">
		<?php the_post_thumbnail('full', ['class' =>"img-fluid w-100"]); ?>
	</figure>

	<!-- All details with sidebar -->
	<div class="row">
		<div class="col-md-8">
			<div id="accordionData">
				<!-- Details -->
				<h3 data-toggle="collapse" data-target="#details" aria-expanded="true" aria-controls="details" class=" py-3 m-0 icon-after-collapse icon-after-collapse-clicked">Details</h3>
				<div id="details" class="collapse show" aria-labelledby="details" data-parent="#accordionData">
					<div class="offset-md-1">
						<?php echo $brief_intro; ?>
						<article class="workshop-description">
						<?php echo $workshop_description; ?>
						</article>
					</div>
				</div>
			
				<!-- Shedule	 -->
				<?php $title = '<h3 data-toggle="collapse" data-target="#shedule" aria-expanded="true" aria-controls="shedule" class=" py-3 m-0 icon-after-collapse collapsed">Schedule</h3>';?>
				<?php if($get_the_schedule_type == "daily"):
					$days = array('one_day','two_days','three_days','four_days','five_days','six_days');
					foreach($days as $day){
						if($day == $number_of_days && $day != 'one_day') {
							$day_content = get_field($day."_content");
							echo $title;
							echo '<div id="shedule" class="collapse" aria-labelledby="shedule" data-parent="#accordionData">';
							$i = 1; foreach($day_content as $content) {
								if($content){
									echo '<div class="offset-md-1">';
										echo "<h4>Day ".$i++."</h4>";
										echo $content;
									echo '</div>';
								}
							}
							echo '</div>';
							
						}
					} 
				else:
					$all_weeks = array('two_week','three_week','four_week');
					foreach($all_weeks as $week){
						if($week == $number_of_weeks) {
							$week_content = get_field($week."s_content");
							echo $title;
							echo '<div id="shedule" class="collapse" aria-labelledby="shedule" data-parent="#accordionData">';
							$i = 1; foreach($week_content as $content) {
								if($content){
									echo '<div class="offset-md-1">';
										echo "<h4>Week ".$i++."</h4>";
										echo $content;
									echo '</div>';
								}
							}
							echo '</div>';
						}
					}
				endif;?>
				
				
				<!-- Facilitators -->
				

							<?php $facilitators = get_field('facilitators');
							if ($facilitators):?>
			<h3 data-toggle="collapse" data-target="#single-workshop-facilitators" aria-expanded="true" aria-controls="single-workshop-facilitators" class=" py-3 m-0 icon-after-collapse collapsed">Facilitators</h3>
				<div id="single-workshop-facilitators" class="collapse" aria-labelledby="facilitators" data-parent="#accordionData">
					<div class="offset-md-1">
						<div class="card-deck scrolling-wrapper-flexbox">
								<?php $noOfFacilitators = sizeof($facilitators);
							foreach($facilitators as $fac){?>
								<div class="card shadow-sm <?php if($noOfFacilitators == 1){echo "mx-auto";} ?>" data-toggle="modal" data-target="#facilitator_<?php echo $fac->ID?>">
									<figure class="facilitaor-avatar">
										<?php echo get_the_post_thumbnail($fac->ID, 'medium', ['class' =>"card-img-top"]); ?>
									</figure>
									<div class="facilitator-details">
									<h5><?php echo $fac->post_title; ?></h5>
									<p class="m-0"><small class="text-muted">
									<?php 
									$facilitatorUnitName = get_field('unit_name', $fac->post_Id);
									if($facilitatorUnitName):
										$facilitatorsUnitStr = array();
										foreach($facilitatorUnitName as $unitName){
												$facilitatorsUnitStr[] = $unitName->post_title;
									   } 
									   echo implode(",",$facilitatorsUnitStr);
                                    endif;
                                ?>
									</small></p>
									</div>
								</div>
								<div class="modal fade" id="facilitator_<?php echo $fac->ID?>">
										<div class="modal-dialog">
											<div class="modal-content">
										
											<!-- Modal Header -->
											<div class="modal-header">
											<h4 class="modal-title my-auto"><?php echo $fac->post_title; ?></h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											
											<!-- Modal body -->
											<div class="modal-body">
											
												<figure class="facilitaor-avatar">
													<?php echo get_the_post_thumbnail($fac->ID, 'medium', ['class' =>"card-img-top"]); ?>
												</figure>
   												 <article>
													<p class="text-md-left text-justify">
      												 <?php echo $fac->post_content;?>
      												</p>
												</article>
											</div>
											
											<!-- Modal footer -->
											<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
											
										</div>
										</div>
									</div>
							<?php } 
							else:
							?>

							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Organizing Unit -->
				

						<?php $units = get_field('unit_name');
						if($units):?>
				<h3 data-toggle="collapse" data-target="#single-workshop-unit" aria-expanded="true" aria-controls="single-workshop-unit" class=" py-3 m-0 icon-after-collapse collapsed">Organizing Unit</h3>
				<div id="single-workshop-unit" class="collapse" aria-labelledby="unit" data-parent="#accordionData">
				<div class="offset-md-1">
						<div class="card-deck scrolling-wrapper-flexbox">


							<?php $noOfUnits = sizeof($units);
							foreach($units as $unit){?>
								<div class="card shadow-sm <?php if($noOfUnits == 1){echo "mx-auto";}else{ echo"mr-3";} ?>" data-toggle="modal-unit" data-target="#unitModal">
									<!-- <figure class="unit-avatar p-2">
										<?php // echo get_the_post_thumbnail($unit->ID,'medium',['class' => "card-img-top"]);?>
									</figure>	 -->
									<div class="card-body unit-details">
											<h5><?php echo $unit->post_title; ?></h5>
											<small class="text-muted">
											
											<?php  echo wp_trim_words( $unit->post_content, 20, ' ...'); ?>
											<table class="table table-borderless my-4">
												<tbody>

													

													
													<tr>
														<td class="pt-0 pl-0 mb-2">
															<?php $unitContactDynamic = get_field("contact_phone_number", $unit->ID);
															echo '<a href="tel:'.$unitContactDynamic.'">'.$unitContactDynamic.'</a>' ?>
														</td>
													</tr>
												
												
													<tr>
														
														<td class="pt-0 pl-0 mb-2">
															<?php $unitEmailDynamic = get_field("contact_email", $unit->ID); 
															echo '<a href="mailto:'.$unitEmailDynamic.'">'.$unitEmailDynamic.'</a>';?>
														</td>
													</tr>
											

													
												</tbody>
											</table>
											</small>
									</div>
								</div>
								
							<?php } 
							else: 
						?>
							<!-- <div class="media mb-3">
									<figure>
									<?php // echo get_the_post_thumbnail($unit->ID,'medium',['class' => "mr-3"]);?>
									</figure>
									<div class="media-body">
										<h5 class="mt-0"><?php // echo $unit->post_title; ?></h5>
										<p class="mb-0">
										<small class="text-muted">
										<?php  // echo wp_trim_words( $unit->post_content, 50, '...'); ?>
										</small></p>
									</div>
							</div> -->
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div><!--accordin-->
			<div class="or-spacer">
				<div class="mask"></div>
			</div>
			<h3 class="h3 my-4">Contact Information</h3>
			<div class="single-workshop-contact card-deck">
			<?php if($units): ?>
			<?php foreach($units as $unit){ ?>
				<div class="card">
					
					<span class="card-body">
						<h5 class="card-title">
						<?php

						$contactName = get_field('contact_person_name', $unit->post_Id);
						echo($contactName); ?>
						</h5>
						<table class="table table-borderless">
							<tbody>	
							<tr>
								<td class="pl-0">
									<?php $unitContactDynamic = get_field("contact_phone_number", $unit->ID);
									echo '<a href="tel:'.$unitContactDynamic.'">'.$unitContactDynamic.'</a>' ?>
								</td>
							</tr>
						
						
							<tr>
								
								<td class="pl-0">
									<?php $unitEmailDynamic = get_field("contact_email", $unit->ID); 
									echo '<a href="mailto:'.$unitEmailDynamic.'">'.$unitEmailDynamic.'</a>';?>
								</td>
							</tr>
							</tbody>
						</table>
					</span>
					
				</div>
				<?php break; } endif; ?>
			</div>	

		</div> <!--col-md-8-->
		<div class="col-md-3 offset-md-1">
		<form method="post" action="" id="preRegistrationForm">

		
		<div class="col-12 p-0">	
					<h3 class=" py-3 m-0 brownline-before">Date</h3>
		</div>
		
		<div class="col-10 offset-md-2 p-0">
		<select class="form-control" id="usrSelectDate">	
			<?php
			$today=date("d/m/Y");
			if(have_rows('date_repeater') ):
				while (have_rows('date_repeater') ) : the_row(); 
				?>
				
			
			<?php	// loop through the rows of data
			  
			  
			  $selectStartDate = get_sub_field('start_date');
			  $selectEndDate = get_sub_field('end_date');
			  $getDateFromUrl = '';
			  if(!empty(esc_html($_GET['startDate']))){
				  
				  $getDateFromUrl = date("d/m/Y",strtotime(esc_html($_GET['startDate'])));
				  
			  }	
			  if(isset($selectStartDate) && $selectEndDate>=$today ):
						
			?>
					<option name=<?php echo $selectStartDate;?>
					<?php if($selectStartDate === $getDateFromUrl){
						echo 'selected'; 
						}?>>
					<?php
						$convertedStartDateForSelection = DateTime::createFromFormat('d/m/Y', $selectStartDate)->format('j F, Y');
					echo $convertedStartDateForSelection; ?>
					</option>
				
				<?php
				else: echo '<option name="Workshop Unavailable" disabled>Currently not available</option>'; break;
				endif; 
				endwhile; ?>
				</select>
				<p class="offset-1 text-muted small">
			<small>*Click to see other available dates</small>
			</p>
		<?php endif;?>		
		</div>
		<div class="col-12 p-0">
			<h3 class=" py-3 m-0 brownline-before">Fees</h3>
		</div>
		<div class="col-10 offset-md-2 p-0">
			
			<?php

					$payment_with_accommodation = get_field('payment_with_accommodation');
					$payment_details_with_accommodation = get_field('payment_details_with_accommodation');
					
					$payment_without_accommodation = get_field('payment_without_accommodation');
					$payment_details_without_accommodation = get_field('payment_details_without_accommodation');
			 ?>
			 <?php if($payment_details_with_accommodation && $payment_with_accommodation):?>		
			<label>
				<input class="" type="radio" name="feesSelector" id="<?php echo($payment_with_accommodation); ?>" value="<?php echo($payment_with_accommodation); ?>" checked>
				<?php echo("₹ ".$payment_with_accommodation." Per Person"); ?>
			</label>
			<p class="offset-1 text-muted small">
			<small><?php echo($payment_details_with_accommodation); ?></small>
			</p>
			<!-- <?php //else:?>
			<label>
				<input class="d-none" type="radio" name="feesSelector" id="noFee" value="0" checked>
				Please contact us for more information. Thank you!
			</label> -->
			<?php endif; ?>

			</div>
		<div class="col-10 offset-md-2 p-0">
		<?php					?>
					<?php if($payment_details_without_accommodation && $payment_without_accommodation): ?>	
						<label>
						<input class="" type="radio" name="feesSelector" id="<?php echo($payment_without_accommodation); ?>" value="<?php echo($payment_without_accommodation); ?>">
						<?php echo("₹ ".$payment_without_accommodation." Per Person"); ?>
						</label>
						<p class="offset-1 text-muted small">
						<small><?php echo($payment_details_without_accommodation); ?></small>
						</p>

					<?php endif; ?>
		</div>
		
		<div class="col-12 p-0 d-flex flex-column text-center">
			<button class="btn btn-primary mx-auto" type="submit" form="preRegistrationForm" name="registrationFormBtn" id="registrationFormBtn"
			data-url="<?php echo get_admin_url().'admin-ajax.php'?>">
				Register now
			</button>		
			<span id="status"></span>					
			
		</div>
	</form>
		
		</div> <!--- col-md-3 -->
	</div><!--row-->
</div>



<?php endwhile; // end of the loop. ?>

<?php wp_reset_postdata(); // reset the query ?> 
<?php get_footer('agp'); ?>
