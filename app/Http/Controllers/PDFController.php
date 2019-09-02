<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Customer;
use App\Course;
use App\CustomersCourses;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customerId = 1)
    {
        // customer info
        $customerData = Customer::where('id', $customerId)->first();

        //dd($customerData);

        // extracting courses data
        $coursesData = CustomersCourses::where('customer_id', $customerId)->get()->toArray();
        $courseIds = [];
        foreach($coursesData as $key => $value){
            array_push($courseIds, $value['course_id']);
        }

        $courses = [];
        foreach($courseIds as $singleCoursePosition => $singleCourseId){
            $courseData = Course::where('id', $singleCourseId)->get();
            $course = $courseData->pluck('name');
            array_push($courses, $course[0]);
        }

        // $pdf = PDF::loadView('pdf', $content);  
        // return $pdf->download('medium.pdf');
        return view('pdf', compact('customerData', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
