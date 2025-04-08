<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'first_name' => 'sometimes|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'grade_level' => 'sometimes|integer|between:1,5|nullable',
            'school' => 'nullable|string|max:255',
            'coach_name' => 'nullable|string|max:255',
            'role' => 'sometimes|in:admin,user',
        ];
    }

    public function prepareForValidation()
{
    $this->merge([
        'first_name' => trim($this->first_name),
        'middle_name' => $this->middle_name ? trim($this->middle_name) : null,
        'last_name' => trim($this->last_name),
        'school' => $this->school ? trim($this->school) : null,
        'coach_name' => $this->coach_name ? trim($this->coach_name) : null,
    ]);
}
}
