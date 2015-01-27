<?php $breadcrumb_t = $list->cat_name
//$breadcrumb_p = $course->college->college_name . ', ' . $course->college->city_name; ?>

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

<?php foreach($list->articles as $key=>$article) {   ?>


<article class="events type-events status-publish has-post-thumbnail hentry">
 
<div class="text">
                        <div class="event-texttop">
                            <h2 class="cs-post-title">
                                <a href="<?php echo Config::get('app.baseurl'); ?>article_details/<?php echo $article->article_id ?>" class="colrhvr"><?php echo $article->article_title ?></a>
                            </h2>
                                <ul class="post-categories">
                                	<?php if($article->article_intro) { ?>
                                    <li><a href="<?php echo Config::get('app.baseurl'); ?>article_details/<?php echo $article->article_id ?>" rel="tag"><?php echo $article->article_intro ?></a></li>  
                                    <?php } ?>
                                    <li><i class="fa fa-clock-o"></i><span><?php echo $article->article_publish_date ?></span></li> 
                                </ul>
                        </div>
                         
                                </div>




            </article>


<?php  }  ?>

</div>
                   <?php // echo $pagination; ?>
</div>

</div>
<aside class="col-md-3">
   

</aside>
</div></div></div>

@stop

