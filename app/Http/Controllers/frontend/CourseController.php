<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount(['enrollments as enrolled_students_count' => function ($query) {
            $query->where('status', 'approved');
        }])->get();

        foreach ($courses as $course) {
            $starting_date = Carbon::parse($course->starting_date);
            $ending_date = Carbon::parse($course->end_date);
            $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);
        }
        $searchCourses = Course::all();
        return view('frontend.course', compact('courses', 'searchCourses'));
    }

    public function details($id)
    {
        $course = Course::with('teachers')->withCount(['enrollments as enrolled_students_count' => function ($query) {
            $query->where('status', 'approved');
        }])->findOrFail($id);
    
        $starting_date = Carbon::parse($course->starting_date);
        $ending_date = Carbon::parse($course->end_date);
        $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);

        $reviews = $course->reviews()->with('student')->get();

        return view('frontend.course-details', compact('course', 'reviews'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'course_id' => 'required|string'
        ]);
        $courseId = $request->input('course_id');
        $courses = Course::where('id', 'like', "%$courseId%")->get();
        $searchCourses = Course::all();
        return view('frontend.course', compact('courses', 'searchCourses'));
    }


}
