<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('student') ? $this->route('student')->id : null;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone_no' => 'required',
            'password' => [
                'nullable',
                'confirmed', 
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
            'image' => 'nullable',
            'address' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'is_blocked' => 'nullable|boolean',
            'is_certificate_enable' => 'nullable|boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.unique' => 'This email is already registered',
            'phone_no.required' => 'Phone number is required',
            'password.confirmed' => 'Password does not match',
            'password.min' => 'Password must be at least 8 characters',
            'password.mixed_case' => 'Password must contain at least one uppercase and one lowercase letter',
            'password.letters' => 'Password must contain at least one letter',
            'password.numbers' => 'Password must contain at least one number',
            'address.max' => 'Address must not be more than 255 characters',
        ];
    }
}
