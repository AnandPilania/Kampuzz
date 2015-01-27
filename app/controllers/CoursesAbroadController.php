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

        $courses = AbroadCourse::with('eligibility')
            ->whereIn('parent_course_id', $arr)
            ->where('has_detail', '=', 1)
            ->join('abroad_university', 'abroad_university.univ_id', '=', 'abroad_courses.univ_id')
            ->where('abroad_university.country', '=', $country)
            ->orderBy('has_detail', 'DESC')
            ->orderBy('course_name', 'ASC')
            ->paginate(Config::get('view.results_per_page'));


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