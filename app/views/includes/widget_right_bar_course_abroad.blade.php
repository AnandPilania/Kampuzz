<?php

//$citylist = City::groupBy('city_group')->orderBy('k_city_id')->take(10)->skip(0)->get() ;
	
?>
	<div class="widget">

		<?php $countries = Menu::$countries ;  ?>

		<div class="widget_categories">
			<header class="cs-heading-title">
				<h2 class="cs-section-title">Study Abroad</h2>
			</header>
			
			<ul>
			<?php foreach($countries as $key=>$country) {  ?>
  				<li class="cat-item">
  					<a href="<?php echo url('abroad/courses/'.$country['name']) ?>">
  						<?php echo $country['name'] ?>
  					</a> 
  					<img 
  						src= "<?php echo url('') ?>/images/flags/<?php echo $country['code'] ?>.gif" 
  						alt="Study in United States"
  					>
				</li>
			<?php } ?>
  	 		</ul>
		</div>


		<div class="course_filters">
			<header class="cs-heading-title">
				<h2 class="cs-section-title">Filters</h2>
			</header>
			<form action="">
			<!-- <h4>Location</h4> -->
			<!-- <ul class="category_filter">
				<li>
					<input id="technology" type="checkbox" class="bp-course-category-filter" name="location" value=""> 
					<label for="technology">All</label>
				</li>
				
				<?php
					//foreach($citylist as $key=>$city) {
				?>
				<li>
					<input id="city_<?php //echo $key ?>" type="checkbox" class="bp-course-category-filter" name="location[]" value="<?php //echo $city->city_group ?>"> 
					<label for="technology"><?php //echo $city->city_group ?></label>
				</li>

				<?php //} ?>
				
			</ul> -->

			<h4>Total Fees(INR)</h4>
			<ul class="type_filter">
				<li>
					<input id="fees_4" type="radio" class="bp-course-free-filter" name="fees" value=""> 
					<label for="fees_4">Any</label>
				</li>
				<li>
					<input id="fees_1" type="radio" class="bp-course-free-filter" name="fees" value="10"> 
					<label for="fees_1">Upto 10 Lakh</label>
				</li>
				<li>
					<input id="fees_2" type="radio" class="bp-course-free-filter" name="fees" value="15">
					 <label for="fees_2">Upto 15 Lakh</label>
				</li>
				<li>
					<input id="fees_3" type="radio" class="bp-course-free-filter" name="fees" value="20"> 
					<label for="fees_3">Upto 20 Lakh</label>
				</li>
				
			</ul>

			<h4>Specialization</h4>
			<ul class="type_filter">
				<li>
					<input id="specialization_any" type="radio" class="bp-course-free-filter" name="specialization" value=""> 
					<label for="speicialization_any">Any</label>
				</li>
				<?php foreach($specialization_filter as $key=>$specialization) { ?>
				
				<li>
					<input 	id="specialization_<?php echo $key ?>" 
							type="radio" 
							class="bp-course-free-filter" 
							name="specialization" 
							value="<?php echo $specialization['specialization_name'] ?>">
					 <label for="specialization_<?php echo $key ?>" >
					 	<?php echo trim($specialization['specialization_name']) ?>
					 </label>
				</li>
				<?php } ?>
			</ul>

			<input type="submit" id="submit_filters" name="submit_filters" value="Filter" class="btn btn-info btn-btn-sm" />
		    </form>
		</div>

		
	
	</div>

