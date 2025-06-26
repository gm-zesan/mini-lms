<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:user-list|user-create|user-edit|user-delete', only: ['index']),
            new Middleware('permission:user-create', only: ['create', 'store']),
            new Middleware('permission:user-edit', only: ['edit', 'update']),
            new Middleware('permission:user-delete', only: ['destroy']),
        ];
    }

    
    public function index(Request $request){
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $users = User::withoutRole(['student','teacher'])->get();
            } else {
                $users = User::whereHas('roles', function ($query) {
                    return $query->where('name','!=', 'superadmin');
                })->where('id','!=',$auth_user->id)->withoutRole(['student','teacher'])->get();
            }
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('phone_no', function($row){
                    return $row->phone_no ?? 'N / A';
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.users.index');
    }


    public function create(){
        return view('admin.users.create');
    }


    public function store(UserRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('all-users', 'public');
        }
        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        $user->assignRole('admin');
        return redirect()->route('users.index')->with('success','User created successfully');
    }


    public function edit(User $user){
        return view('admin.users.edit',[
            'user'=>$user,
        ]);
    }


    public function update(UserRequest $request, User $user){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $validated['image'] = $request->file('image')->store('all-users', 'public');
        }
        $user->update($validated);
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    public function destroy(User $user){
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
