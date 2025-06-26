<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email',
                'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|numeric|not_regex:/[a-z]/i',
                'subject' => 'required',
                'message' => 'required',
            ], [
                'name.max' => 'your name should be less than 100 characters',
                'phone.regex' => 'Invalid phone number',
                'phone.not_regex' => 'Invalid phone number',
                'email.required' => 'email is required',
                'email.max' => 'your email should be less than 100 characters',
                'subject.required' => 'subject is required',
                'message.required' => 'message is required',
            ]);
            ContactForm::create($data);
            return response()->json([
                'status' => 201,
                'data' => $data,
                'success' => true,
                'message' => 'Message sent successfully'
            ]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }
    }
}
