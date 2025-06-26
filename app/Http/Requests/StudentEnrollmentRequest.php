<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentEnrollmentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_no' => 'required|string|max:15',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string|max:255',
            'total_amount' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'phone_no.required' => 'The phone number is required.',
            'phone_no.max' => 'The phone number may not be greater than 15 characters.',
            'course_id.required' => 'A course must be selected.',
            'course_id.exists' => 'The selected course does not exist.',
            'payment_method.required' => 'The payment method is required.',
            'total_amount.required' => 'The total amount is required.',
            'total_amount.numeric' => 'The total amount must be a valid number.',
            'total_amount.min' => 'The total amount must be at least 0.',
        ];
    }
}
