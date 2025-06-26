<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:our-team-list|our-team-create|our-team-edit|our-team-delete', only: ['index']),
            new Middleware('permission:our-team-create', only: ['create', 'store']),
            new Middleware('permission:our-team-edit', only: ['edit', 'update']),
            new Middleware('permission:our-team-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $ourTeams = OurTeam::all();
            return DataTables::of($ourTeams)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.our_team.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        if($data['cover_image_data'] != "" && $request->hasFile('image')) {
            $imagePath = $request->file('image')->store('our-teams', 'public');
            $data['image'] = $imagePath;
        }

        OurTeam::create($data);
        return redirect()->route('our-teams.index')->with('success', 'Our Team created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeam $ourTeam)
    {
        return view('admin.our_team.edit', ['ourTeam' => $ourTeam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurTeam $ourTeam)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        if($request->hasFile('image') && $data['cover_image_data'] != ""){
            if($ourTeam->image != "" && Storage::disk('public')->exists($ourTeam->image)){
                Storage::disk('public')->delete($ourTeam->image);
            }
            $imagePath = $request->file('image')->store('our-teams', 'public');
            $data['image'] = $imagePath;
        }
        $ourTeam->update($data);
        return redirect()->route('our-teams.index')->with('success', 'Our Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTeam $ourTeam)
    {
        if($ourTeam->image != "" && Storage::disk('public')->exists($ourTeam->image)){
            Storage::disk('public')->delete($ourTeam->image);
        }
        $ourTeam->delete();
        return redirect()->route('our-teams.index')->with('success', 'Our Team deleted successfully');
    }
}
