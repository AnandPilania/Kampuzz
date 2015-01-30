 
<?php

$items = ArticleCat::where('show_nav','=',1)->where('parent_id','=',0)->get() ;

?>

<ul>
     <?php foreach($items as $key=>$cat) {  ?>

          <li class="cat-item">
               <a href="<?php echo url(''); ?>/articles/<?php echo $cat->cat_id ; ?>">
                    <?php echo $cat->cat_name  ?>
               </a>
          </li>
     <?php } ?>
</ul>