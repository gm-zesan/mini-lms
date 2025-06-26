<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CourseController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:course-list|course-create|course-edit|course-delete|course-certificate-status', only: ['index']),
            new Middleware('permission:course-create', only: ['create', 'store']),
            new Middleware('permission:course-edit', only: ['edit', 'update']),
            new Middleware('permission:course-delete', only: ['destroy']),
            new Middleware('permission:course-certificate-status', only: ['certificateStatus']),
        ];
    }

    public function index(Request $request){
        if($request->ajax()){
            $courses = Course::all();
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('price', function($row){
                    return '৳ '.$row->price;
                })
                ->addColumn('is_certificate_enabled', function($row){
                    return [
                        'id' => $row->id,
                        'is_certificate_enabled' => $row->is_certificate_enabled
                    ];
                })
                ->addColumn('action-btn', function($row){
                    $course = Course::find($row->id);
                    $data = [
                        'id' => $course->id,
                        'is_certificate_enabled' => $course->id
                    ];
                    return $data;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.courses.index');
    }

    public function create(){
        $teachers = User::role('teacher')->get();
        return view('admin.courses.create', compact('teachers'));
    }

    public function store(CourseRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        $course = Course::create($validated);
        if ($request->has('teacher_ids')) {
            $teacherData = [];
            foreach ($request->teacher_ids as $teacherId) {
                $teacherData[$teacherId] = [
                    'is_main' => $request->main_teacher_id == $teacherId,
                ];
            }
            $course->teachers()->sync($teacherData);
        }
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }


    public function edit(Course $course){
        $teachers = User::role('teacher')->get();
        $selectedTeacherIds = $course->teachers->pluck('id')->toArray();
        $mainTeacherId = $course->teachers->where('pivot.is_main', 1)->first()?->id;
        return view('admin.courses.edit', compact('course', 'teachers', 'selectedTeacherIds', 'mainTeacherId'));
    }

    public function update(CourseRequest $request, Course $course){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        $course->update($validated);

        if ($request->has('teacher_ids')) {
            $teacherData = [];
            foreach ($request->teacher_ids as $teacherId) {
                $teacherData[$teacherId] = [
                    'is_main' => $request->main_teacher_id == $teacherId,
                ];
            }
            $course->teachers()->sync($teacherData);
        }
    
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course){
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

    public function certificateStatus(Course $course){
        $course->update(['is_certificate_enabled' => !$course->is_certificate_enabled]);
        return redirect()->route('courses.index')->with('success', 'Certificates status change successfully.');
    }
}
