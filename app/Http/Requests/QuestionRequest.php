<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Authorization handled by controller policies
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'content_type' => 'required|in:text,image',
            'category' => 'required|integer|between:1,5',
            'correct_answer' => 'required|in:A,B,C,D',
            'choices' => 'required|array|size:4',
            'choices.*.identifier' => 'required|in:A,B,C,D',
            'choices.*.content' => 'required|string',
            'choices.*.content_type' => 'required|in:text,image',
        ];
    }

    // // Trim whitespace and sanitize inputs
    // public function prepareForValidation()
    // {
    //     $this->merge([
    //         'content' => trim($this->content),
    //         'choices' => collect($this->choices)->map(function ($choice) {
    //             return [
    //                 'identifier' => trim($choice['identifier']),
    //                 'content' => trim($choice['content']),
    //                 'content_type' => trim($choice['content_type']),
    //             ];
    //         })->toArray(),
    //     ]);
    // }
}
