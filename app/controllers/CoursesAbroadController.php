<?php

class CoursesAbroadController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /courses/abroad
     *
     * @return Response
     */

    public function index($country, $id = 1, $slug = NULL, $parent_cat_id = NULL)
    {

        $course_name = AbroadCourse::where('course_id', '=', $id)->first();

        // get all child courses
        if ((int)$parent_cat_id > 0)
        {
            $child_courses = AbroadCourse::where('course_id', '=', $parent_cat_id)->get()->toArray();
        } else
        {
            $child_courses = AbroadCourse::where('parent_course_id', '=', $id)->get()->toArray();
        }

        foreach ($child_courses as $child_course)
        {
            $arr[] = $child_course['course_id'];
        }

          // $select_cities = Input::has('location')? Input::get('location') : [] ;
            $fees = Input::has('fees') ? Input::get('fees') : null ;
            $specialization = Input::has('specialization') ? Input::get('specialization') : null ;
            $exams = Input::has('exams') ? Input::get('exams') : null ;


        $query = AbroadCourse::with('eligibility')
            ->whereIn('parent_course_id', $arr)
            ->where('has_detail', '=', 1)
            ->join('abroad_university', 'abroad_university.univ_id', '=', 'abroad_courses.univ_id')
            ->where('abroad_university.country', '=', $country)
            ->orderBy('has_detail', 'DESC')
            ->orderBy('course_name', 'ASC') ;
           

        // if($select_cities) {

        //    $query =  $query->where(function($query){
        //         $select_cities = Input::has('location')? City::whereIn('city_group',Input::get('location'))->lists('city_name') : [] ;

        //         foreach($select_cities as $key=>$city ) {
        //            $query->orWhere('college_master.city_name','like',"%".$city."%") ;
        //         }
        //     }) ;
        // }

        if($fees) {
            $query->where('fees_lakh_inr','<=',$fees) ;
        }


        if($exams) {
             $query->join('abroad_course_eligibility','abroad_course_eligibility.course_id','=','abroad_courses.course_id') ;
               $query =  $query->where(function($query){
                $exams = Input::has('exams') ? Input::get('exams') : null ;
                foreach($exams as $key=>$exam ) {
                   $query->orWhere('abroad_course_eligibility.exam_name','like',"%{$exam}%") ;
                }
            }) ; 


            }

        
         if($specialization) {
            $query =  $query->where(function($query){
                $specializations = Input::has('specialization') ? Input::get('specialization') : null ;
                foreach($specializations as $key=>$sp ) {
                   $query->orWhere('course_name','like',"%{$sp}%") ;
                }
            }) ;
        }

        $courses = $query->paginate(Config::get('view.results_per_page'));

        $view = View::make('coursesabroad.index', compact('courses', 'course_name', 'country'));

        if(Request::ajax()){
            return $view->renderSections()['content_left'] ;
        }

        return $view ;

    }

    public function detail($country, $id)
    {
         $course = AbroadCourse::where('course_id', '=', $id)
                        ->with('eligibility')
                        ->with('university.campuses')
                        ->first()->toArray();

        return View::make('coursesabroad.detail', compact('course'));
    }
}