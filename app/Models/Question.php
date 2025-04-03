<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'category',
        'question_text', 'question_image',
        'choice_a_text', 'choice_a_image',
        'choice_b_text', 'choice_b_image',
        'choice_c_text', 'choice_c_image',
        'choice_d_text', 'choice_d_image',
        'correct_answer', 'created_by'
    ];
}
