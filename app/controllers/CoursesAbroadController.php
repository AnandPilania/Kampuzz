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

          //  $select_cities = Input::has('location')? City::whereIn('city_group',$filter['location'])->lists('city_name') : [] ;
            $fees = Input::has('fees') ? Input::get('fees') : null ;
            $specialization = Input::has('specialization') ? Input::get('specialization') : null ;


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

        if($specialization) {
           $query->where('course_name','like',"%{$specialization}%") ;
        }

        $courses = $query->paginate(Config::get('view.results_per_page'));

        return View::make('coursesabroad.index', compact('courses', 'course_name', 'country'));

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