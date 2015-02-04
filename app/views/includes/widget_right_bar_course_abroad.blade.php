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
			<form id="form_filter" action="">
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
			<ul id="fees_filter" class="type_filter">
				<li>
					<input id="no_limit" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value=""> 
					<label for="no_limit">No Limits</label>
				</li>
				<li>
					<input id="fees_1" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="5"> 
					<label for="fees_1">Maximum 5 Lakh</label>
				</li>
				<li>
					<input id="fees_2" type="radio" class="bp-course-free-filter" onclick="filtercourses()"  name="fees" value="10">
					 <label for="fees_2">Maximum 10 Lakh</label>
				</li>
				<li>
					<input id="fees_3" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="20"> 
					<label for="fees_3">Maximum 20 Lakh</label>
				</li>
			<!-- 	<li>
					<input id="fees_4" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="700000"> 
					<label for="fees_4">Maximum 7 Lakh</label>
				</li>
				<li>
					<input id="fees_5" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="1000000"> 
					<label for="fees_5">Maximum 10 Lakh</label>
				</li> -->
			</ul>

			<h4>Exams Required</h4>
			<ul id="exams_filter" class="type_filter" style="max-height: 200px; overflow-y:scroll; ">
				<!-- <li>
					<input id="all" type="radio" class="bp-course-free-filter" name="exams" value=""> 
					<label for="all">Any</label>
				</li> -->
				<?php foreach($exam_filter as $key=>$exam) { ?>
				
				<li>
					<input 	id="exam_<?php echo $key ?>" 
							type="checkbox" 
							class="bp-course-free-filter" 
							name="exams[]" 
							onclick="filtercourses()"
							value="<?php echo $exam['name'] ?>">

					 <label for="specialization_<?php echo $key ?>" >
					 	<?php echo $exam['name'] ?>
					 </label>
				</li>
				<?php } ?>
			</ul>

			<h4>Specialization</h4>
			<ul id="specialization_filter" class="type_filter" style="max-height:200px;overflow-y:scroll; ">
				<!-- <li>
					<input id="all" type="radio" class="bp-course-free-filter" name="specialization" value=""> 
					<label for="all">Any</label>
				</li> -->
				<?php foreach($specialization_filter as $key=>$specialization) { ?>
				
				<li>
					<input 	id="specialization_<?php echo $key ?>" 
							type="checkbox" 
							class="bp-course-free-filter" 
							name="specialization[]"
							onclick="filtercourses()"
							value="<?php echo $specialization['specialization_name'] ?>">
					 <label for="specialization_<?php echo $key ?>" >
					 	<?php echo $specialization['specialization_name'] ?>
					 </label>
				</li>
				<?php } ?>
			</ul>

			<!-- <input type="submit" id="submit_filters" name="submit_filters" value="Filter" class="btn btn-info btn-btn-sm" /> -->
		    </form>
		</div>

			<div class="transparentCover"></div> <div class="loading"></div>

	<script> 


    		// $('#loadingImage').show();
    		// $(":submit").attr("disabled", true);


  		$("#form_filter").on('submit',function(e) {
  			e.preventDefault();
  		}) ;
  		function filtercourses(){

  			

    		var form = $('#form_filter');
    		var url = window.location.href ;  // the script where you handle the form input.

    		
    		$(".transparentCover").show();
            $(".loading").show();

   		 $.ajax({
     			type: "GET",
     			beforeSend: function(xhr){
     						xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
     					},
     			url: url,
           		data: form.serialize(), // serializes the form's elements.
           		success: function(data) {
                // Do stuff here
               
               $('#content_left').html(data) ;
               $(".transparentCover").hide();
            	$(".loading").hide();
              },
              error: function(){ console.log('fail') ;}
            });
   		}
  	</script>
	
	</div>

