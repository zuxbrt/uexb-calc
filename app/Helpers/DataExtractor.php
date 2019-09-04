<?php

namespace App\Helpers;

use App\Course;

class DataExtractor 
{

    /**
    //  * Get course data by its ids.
     */
    public function getCoursesData(object $coursesData): array
    {

        $courseIds = [];
        $coursesInfo = [];

        foreach($coursesData as $key => $value){
            array_push($courseIds, $value['course_id']);
        }

        foreach($coursesData as $item => $val){
            $courseData = Course::where('id', $val['course_id'])->get();
            $course_name = $courseData->pluck('name')[0];
            $course_price = $courseData->pluck('price')[0];
            $course_participants = intval($val['course_participants']);

            $aCourse = [
                'course_name' => $course_name,
                'course_price' => $course_price,
                'course_participants' => $course_participants
            ]; 


            array_push($coursesInfo, $aCourse);
        }

        return $coursesInfo;
    }


    public function 

}