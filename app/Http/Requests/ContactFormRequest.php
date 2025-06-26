<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|numeric|not_regex:/[a-z]/i',
            'subject' => 'required',
            'message' => 'required',
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
            'name.max' => 'your name should be less than 100 characters',
            'phone.regex' => 'Invalid phone number',
            'phone.not_regex' => 'Invalid phone number',
            'email.required' => 'email is required',
            'email.max' => 'your email should be less than 100 characters',
            'subject.required' => 'subject is required',
            'message.required' => 'message is required',
        ];
    }
}
