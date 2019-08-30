<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function show(Course $course)
    {
        return view('course.view', compact('course'));
    }

    public function store()
    {
        // validate required values
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'price' => ['required']
        ]);

        $course = Course::create($attributes);
        return redirect('/courses');
    }

    public function update(Course $course)
    {
        // $this->authorize('update', $course);
        $course->update(request(['name', 'price']));
        return redirect('/courses');
    }

    public function destroy(Course $course)
    {
        if(!auth()->User()){
            abort(403);
        } else {
            $course->delete();
            return redirect('/courses/');
        }
    }
}
