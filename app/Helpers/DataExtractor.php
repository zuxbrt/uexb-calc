<?php

namespace App\Helpers;

use App\Course;

class DataExtractor 
{

    /**
    //  * Get course data by their ids.
     */
    public function getCoursesData(object $coursesData): array
    {
        // initialize arrays
        $courseIds = [];
        $coursesInfo = [];

        // extract ids
        foreach($coursesData as $key => $value){
            array_push($courseIds, $value['course_id']);
        }

        // populate data for courses
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

            // add course to array
            array_push($coursesInfo, $aCourse);
        }

        // return courses with data
        return $coursesInfo;
    }

}