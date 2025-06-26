<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:teacher-list|teacher-create|teacher-edit|teacher-delete', only: ['index']),
            new Middleware('permission:teacher-create', only: ['create', 'store']),
            new Middleware('permission:teacher-edit', only: ['edit', 'update']),
            new Middleware('permission:teacher-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teachers = User::role('teacher')->get();
            return DataTables::of($teachers)
                ->addIndexColumn()
                ->addColumn('email', function($row){
                    return $row->email ?? 'N / A';
                })
                ->addColumn('phone_no', function($row){
                    return $row->phone_no ?? 'N / A';
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.teachers.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('all-students', 'public');
        }
        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        $user->assignRole('teacher');
        return redirect()->route('teachers.index')->with('success','Teacher created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, User $teacher){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $validated['image'] = $request->file('image')->store('all-students', 'public');
        }
        $teacher->update($validated);
        return redirect()->route('teachers.index')->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image);
        }
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher deleted successfully');
    }
}
