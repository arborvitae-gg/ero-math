<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization handled by controller policies
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'grade_level' => 'required_if:role,user|integer|between:1,5|nullable',
            'school' => 'nullable|string|max:255',
            'coach_name' => 'nullable|string|max:255',
            'role' => 'required|in:admin,user', // defaults to user
            'quiz_enabled' => 'nullable|boolean', // default to false for users,
        ];
    }

    public function prepareForValidation()
    {
        // Set quiz_enabled to false for users if not provided
        if ($this->role === 'user' && !$this->quiz_enabled) {
            $this->merge(['quiz_enabled' => false]);
        }

        // whitespace handling
        $this->merge([
            'first_name' => trim($this->first_name),
            'middle_name' => $this->middle_name ? trim($this->middle_name) : null,
            'last_name' => trim($this->last_name),
            'school' => $this->school ? trim($this->school) : null,
            'coach_name' => $this->coach_name ? trim($this->coach_name) : null,
        ]);
    }
}
