<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
class DashboardController extends Controller
{
    public function index(){
        $course_count = Course::count();
        $student_count = User::role('student')->count();
        $teacher_count = User::role('teacher')->count();
        return view('admin.home.index', compact('course_count', 'student_count', 'teacher_count'));
    }

    public function cacheClear(){
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        return back()->with('success', 'Cache Cleared Successfully');
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }
    public function myProfile()
    {
        return view('profile.my-profile');
    }

    
}
