<?php

class CourseSpecialization extends \Eloquent {

    

    public function course_entity()
    {
        return $this->morphTo();
    }
}