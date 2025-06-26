<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::with(['teachers' => function ($query) {
            $query->wherePivot('is_main', true);
        }])->withCount(['enrollments as enrolled_students_count' => function ($query) {
            $query->where('status', 'approved');
        }])->latest()->take(6)->get(); 

        foreach ($courses as $course) {
            $starting_date = Carbon::parse($course->starting_date);
            $ending_date = Carbon::parse($course->end_date);
            $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);
        }

        $total_students = User::role('student')->count();
        $total_courses = Course::count();
        $total_teacher = 5;

        return view('frontend.home', compact('courses', 'total_students', 'total_courses', 'total_teacher'));
    }
}
