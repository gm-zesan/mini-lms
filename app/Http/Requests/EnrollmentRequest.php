<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:users,id',
            'payment_method' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255|unique:enrollments,transaction_id',
            'total_amount' => 'required|numeric|min:0',
            'is_certificate_enabled' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Course is required',
            'course_id.exists' => 'Course does not exist',
            'student_id.exists' => 'Student does not exist',
            'payment_method.required' => 'Payment method is required',
            'transaction_id.required' => 'Transaction ID is required',
            'transaction_id.unique' => 'Transaction ID already exists',
            'total_amount.required' => 'Total amount is required',
            'total_amount.numeric' => 'Total amount must be a number',
            'total_amount.min' => 'Total amount must be greater than 0',
            'status.required' => 'Status is required',
            'status.in' => 'Invalid status',
        ];
    }
}
