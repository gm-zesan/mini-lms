<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'starting_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:starting_date',
            'google_classroom_code' => 'nullable|string',
            'what_will_learn' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'time_schedule' => 'nullable|string',
            'total_seats' => 'nullable|integer|min:1',
            'total_lessons' => 'nullable|integer|min:1',
            'teacher_ids' => 'nullable|array',
            'teacher_ids.*' => 'exists:users,id',
            'is_certificate_enabled' => 'nullable|boolean',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'The course title is required.',
            'end_date.after_or_equal' => 'End date must be the same or later than the starting date.',
            'price.min' => 'Price cannot be negative.',
        ];
    }
}
