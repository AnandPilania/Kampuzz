

<div class="widget widget_categories">
	<header class="cs-heading-title">
		<h2 class="cs-section-title">Government Jobs</h2>
	</header>    

	<ul>
	<?php foreach($catlist as $key=>$cat) {  ?>

  		<li class="cat-item">
  			<a href="<?php echo url('') ; ?>/articles/<?php echo $cat->cat_id ; ?>">
  				<?php echo $cat->cat_name  ?>
  			</a>
  		</li>
  	<?php } ?>
	</ul>

</div>
