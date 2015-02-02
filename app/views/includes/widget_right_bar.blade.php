<?php

$citylist = City::orderBy('k_city_id')->get() ;

?>
<script>

	 function filterList(ob) {
  			URL = "{{ url('getcities').'/' ; }}" ;
  			
  			val = ob.value ;
  			
  			$.get( URL + val,function(data) {

  				$('#location_filter').html(data) ;

  			}) ;
  		}
</script>
	<div class="widget">
		<div class="course_filters">
			<header class="cs-heading-title">
				<h2 class="cs-section-title">Filters</h2>
			</header>
			<form action="" id="form_filter">
			<h4>Location</h4>
			<!-- <div>
			Search :
			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			<input class="bp-course-category-filter" type="text" maxlength="22" onkeyup="filterList(this);" id="locationSearchBox" value="">
			<span onclick="turnOffMultiLocationFiltering('locationSearchBox');" style="cursor: pointer; display: none;" class="filterClear">×</span>
			</div> -->
			<div class="form-group">
    			<input type="text" class="form-control" onkeyup="filterList(this);" placeholder="Search">
  			</div>
  			<!-- <div class="right-inner-addon">
        		<i class="icon-search"></i>
        		<input type="search" class="form-control" placeholder="Search">
    		</div> -->
			<ul id="location_filter" class="category_filter" style="max-height: 200px; overflow-y:scroll; ">
				<!-- <li>
					<input id="technology" type="checkbox" class="bp-course-category-filter" name="location" value=""> 
					<label for="technology">All</label>
				</li> -->
				
				<?php
					foreach($citylist as $key=>$city) {
				?>
				<li>
					<input id="city_<?php echo $key ?>" 
							type="checkbox" 
							class="bp-course-category-filter" 
							name="location[]" 
							onclick="filtercourses()"
							value="<?php echo $city->city_name ?>"

							> 
					<label for="city_<?php echo $key ?>">
						<?php echo $city->city_name ?>
					</label>
				</li>

				<?php } ?>
				
			</ul>

			<h4>Total Fees(INR)</h4>
			<ul id="fees_filter" class="type_filter">
				<li>
					<input id="no_limit" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value=""> 
					<label for="no_limit">No Limits</label>
				</li>
				<li>
					<input id="fees_1" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="100000"> 
					<label for="fees_1">Maximum 1 Lakh</label>
				</li>
				<li>
					<input id="fees_2" type="radio" class="bp-course-free-filter" onclick="filtercourses()"  name="fees" value="200000">
					 <label for="fees_2">Maximum 2 Lakh</label>
				</li>
				<li>
					<input id="fees_3" type="radio" class="bp-course-free-filter" onclick="filtercourses()" name="fees" value="500000"> 
					<label for="fees_3">Maximum 5 Lakh</label>
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
		
	<script> 

		$("#form_filter").on('submit',function(e) {
  			e.preventDefault();
  		}) ;
  		function filtercourses(){

  			

    		var form = $('#form_filter');
    		var url = window.location.href ;  // the script where you handle the form input.

    		// $('#loadingImage').show();
    		// $(":submit").attr("disabled", true);

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
              },
              error: function(){ console.log('fail') ;}
            });
   		}
  		

  		
  	</script>
	</div>

