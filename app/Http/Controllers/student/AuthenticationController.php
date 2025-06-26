<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function index(){
        return view('frontend.login');
    }

    public function register(StudentRequest $request){
        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => Hash::make($request->password),
        ]);
        Session::put('student_id', $student->id);
        Session::put('student_name', $student->name);
        $student->assignRole('student');
        return redirect()->route('student.my-account')->with('success', 'Registration Successful');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $student = User::where('email', $request->email)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            Session::put('student_id', $student->id);
            Session::put('student_name', $student->name);
            return redirect()->route('student.my-account')->with('success', 'Login Successful');
        }
        
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');
        return redirect()->route('frontend.home');
    }
}
