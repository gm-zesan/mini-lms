<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CoursesController extends Controller
{
    public function index()
    {
        $student = Session::get('student_id') ? User::find(Session::get('student_id')) : null;
        if(!$student){
            return redirect()->route('student.login')->with('error', 'You need to login to access this page.')->with('status', 'login');
        }

        $approvedEnrollments = $student->enrollments()->where('status', 'approved')->with('course')->get();
        $courses = $approvedEnrollments->pluck('course');

        foreach ($courses as $course) {
            $starting_date = Carbon::parse($course->starting_date);
            $ending_date = Carbon::parse($course->end_date);
            $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);
        }
        return view('student.courses', compact('courses'));
    }

    public function submitReview(Request $request, $courseId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:500',
        ]);
        $student = Session::get('student_id') ? User::find(Session::get('student_id')) : null;
        if(!$student){
            return redirect()->route('student.login')->with('error', 'You need to login to access this page.')->with('status', 'login');
        }

        Review::create([
            'student_id' => $student->id,
            'course_id' => $courseId,
            'rating' => $validated['rating'],
            'feedback' => $validated['feedback'],
        ]);
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
