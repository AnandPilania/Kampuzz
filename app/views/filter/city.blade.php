


	@foreach ($citylist as $key=>$city) 
				
		<li>
			<input id="city_<?php echo $key ?>" 
					type="checkbox" 
					class="bp-course-category-filter" 
					name="location[]" 
					onclick="filtercourses()"
					value="<?php echo $city->city_name ?>">
					 
			<label for="technology"><?php echo $city->city_name ?></label>
		</li>

	@endforeach