<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class EnrollmentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:enrollment-list|enrollment-create|enrollment-edit|enrollment-delete', only: ['index']),
            new Middleware('permission:enrollment-create', only: ['create', 'store']),
            new Middleware('permission:enrollment-edit', only: ['edit', 'update']),
            new Middleware('permission:enrollment-delete', only: ['destroy']),
        ];
    }

    public function index(Request $request){
        if($request->ajax()){
            $enrollments = Enrollment::all();
            return DataTables::of($enrollments)
                ->addIndexColumn()
                ->addColumn('course_id', function($row){
                    return $row->course->title;
                })
                ->addColumn('student_id', function($row){
                    return $row->student->name  . ' (' . $row->student->email . ')';
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.enrollments.index');
    }

    // Show the form for creating a new enrollment
    public function create()
    {
        $courses = Course::all();
        $students = User::role('student')->get();
        return view('admin.enrollments.create', compact('courses', 'students'));
    }

    // Store a newly created enrollment in storage
    public function store(EnrollmentRequest $request)
    {
        $validated = $request->validated();
        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    // Show the form for editing the specified enrollment
    public function edit(Enrollment $enrollment)
    {
        return view('admin.enrollments.edit', compact('enrollment')); 
    }

    // Update the specified enrollment in storage
    public function update(Request $request, Enrollment $enrollment)
    {
        $enrollment->status = $enrollment->status === 'pending' ? 'approved' : 'pending';
        $enrollment->save();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    // Remove the specified enrollment from storage
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
