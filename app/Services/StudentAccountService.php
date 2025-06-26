<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class StudentAccountService
{
    public function updateUser(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['password', 'current_password', 'password_confirmation', 'image']);
        $student->update($data);

        if ($request->filled('password')) {
            $request->validate([
                'current_password' => 'required|string',
                'password' => 'string|min:8|confirmed',
            ]);
            if (!Hash::check($request->current_password, $student->password)) {
                throw ValidationException::withMessages(['current_password' => 'The current password is incorrect.']);
            }
            $student->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $student->image = $request->file('image')->store('all-students', 'public');
        }

        $student->save();
    }
}
