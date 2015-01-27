
<?php 
$breadcrumb_t = $article->article_title  ;

?>






@extends('layouts.main')

@section('content')
    

<div id="main" role="main">
        <!-- Container Start -->
            <div class="container">
                <!-- Row Start -->
                <div class="row">
                      <div class="col-md-9">
                        <div class="rich_editor_text"></div>    
    <div class="element_size_100">
      <header class="cs-heading-title">
                    <h2 class="cs-section-title float-left">View Articles</h2>
                      </header>
     <div class="event eventlisting">

		<article>
		                                
		     <div class="detail_text">

		     	<?php echo $article->article_content ; ?>

		     </div>


		</article>

	</div>
               
</div>

</div>
<aside class="col-md-3">
   
  <?php 	echo $catlist ;  ?>

</aside>
</div></div></div>

@stop

