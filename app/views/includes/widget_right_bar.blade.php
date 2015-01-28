<?php

$citylist = City::groupBy('city_group')->orderBy('k_city_id')->take(10)->skip(0)->get() ;
	
?>
	<div class="widget">
		<div class="course_filters">
			<header class="cs-heading-title">
				<h2 class="cs-section-title">Filters</h2>
			</header>
			<form action="">
			<h4>Location</h4>
			<ul class="category_filter">
				<li>
					<input id="technology" type="checkbox" class="bp-course-category-filter" name="location" value=""> 
					<label for="technology">All</label>
				</li>
				
				<?php
					foreach($citylist as $key=>$city) {
				?>
				<li>
					<input id="city_<?php echo $key ?>" type="checkbox" class="bp-course-category-filter" name="location[]" value="<?php echo $city->city_group ?>"> 
					<label for="technology"><?php echo $city->city_group ?></label>
				</li>

				<?php } ?>
				
			</ul>

			<h4>Total Fees(INR)</h4>
			<ul class="type_filter">
				<li>
					<input id="all" type="radio" class="bp-course-free-filter" name="fees" value="100000"> 
					<label for="all">Maximum 1 Lakh</label>
				</li>
				<li>
					<input id="free" type="radio" class="bp-course-free-filter" name="fees" value="200000">
					 <label for="free">Maximum 2 Lakh</label>
				</li>
				<li>
					<input id="paid" type="radio" class="bp-course-free-filter" name="fees" value="300000"> 
					<label for="paid">Maximum 3 Lakh</label>
				</li>
			</ul>


			<h4>Specialization</h4>
			<ul class="type_filter">
				<li>
					<input id="all" type="radio" class="bp-course-free-filter" name="specialization" value=""> 
					<label for="all">Any</label>
				</li>
				<?php foreach($specialization_filter as $key=>$specialization) { ?>
				
				<li>
					<input 	id="specialization_<?php echo $key ?>" 
							type="radio" 
							class="bp-course-free-filter" 
							name="specialization" 
							value="<?php echo $specialization['specialization_name'] ?>">
					 <label for="specialization_<?php echo $key ?>" >
					 	<?php echo $specialization['specialization_name'] ?>
					 </label>
				</li>
				<?php } ?>
			</ul>

			<input type="submit" id="submit_filters" name="submit_filters" value="Filter" class="btn btn-info btn-btn-sm" />
		    </form>
		</div>
	</div>

