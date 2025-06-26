<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $userId = $this->route('teacher') ? $this->route('teacher')->id : null;
        return [
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . $userId,
            'phone_no' => 'nullable',
            'password' => 'nullable',
            'image' => 'nullable',
            'address' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'is_blocked' => 'nullable|boolean',
            'is_certificate_enable' => 'nullable|boolean',
        ];
    }
}
