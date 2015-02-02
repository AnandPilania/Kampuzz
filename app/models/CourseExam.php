<?php

class CourseExam extends \Eloquent {

    

    public function course_entity()
    {
        return $this->morphTo();
    }
}