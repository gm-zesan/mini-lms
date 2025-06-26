<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\StudentAccountService;

class AccountController extends Controller
{
    protected $studentAccountService;

    public function __construct(StudentAccountService $studentAccountService)
    {
        $this->studentAccountService = $studentAccountService;
    }
    public function index()
    {
        $student = User::find(Session::get('student_id'));
        return view('student.my-account', compact('student'));
    }
    

    public function update(Request $request, User $student)
    {
        if (Session::get('student_id') != $student->id) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
        $this->studentAccountService->updateUser($request, $student);
        return redirect()->back()->with('success', 'Account updated successfully.');
    }

}
