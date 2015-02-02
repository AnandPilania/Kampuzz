<?php
/*Event::listen('illuminate.query', function($sql, $bindings, $time){


    // To get the full sql query with bindings inserted
    $sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
    $full_sql = vsprintf($sql, $bindings);
   echo $full_sql.'<br>
   ';
});*/
Route::get('/',array('as'=>'home','uses'=>'HomeController@index')) ;
Route::get('courses/{id}-{slug?}/{parent_cat_id?}',array('as'=>'courses','uses'=>'CoursesController@index')) ;
Route::get('courses/detail/{id}-{slug?}',array('as'=>'courses.detail','uses'=>'CoursesController@detail')) ;
Route::get('college/{id?}-{slug?}',array('as'=>'college','uses'=>'CollegeController@index')) ;
Route::get('abroad/courses/{country}/{id?}/{slug?}/{parent_cat_id?}',array('as'=>'courses.abroad','uses'=>'CoursesAbroadController@index')) ;
Route::get('abroad/course-detail/{country}/{id}-{slug?}',array('as'=>'courses.abroad.detail','uses'=>'CoursesAbroadController@detail')) ;

Route::get('articles/{id}',array('uses'=>'ArticleController@articles')) ;
Route::get('article_details/{id}',array('uses'=>'ArticleController@articleDetails')) ;


Route::get('getcities/{text?}',array('as'=>'citylist','uses'=>'FilterController@cities'));