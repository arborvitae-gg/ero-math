<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // $question = Question::create([
        //     'content' => 'What is 2 + 2?',
        //     'content_type' => 'text',
        //     'category' => 1,
        //     'correct_answer' => 'A',
        //     'created_by' => 1, // Assume admin user ID is 1
        // ]);

        // $choices = [
        //     ['identifier' => 'A', 'content' => '4', 'content_type' => 'text'],
        //     ['identifier' => 'B', 'content' => '5', 'content_type' => 'text'],
        //     ['identifier' => 'C', 'content' => '6', 'content_type' => 'text'],
        //     ['identifier' => 'D', 'content' => '7', 'content_type' => 'text'],
        // ];

        // $question->choices()->createMany($choices);
    }
}
