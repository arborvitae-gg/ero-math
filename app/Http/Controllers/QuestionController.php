<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $fields = $request->validate([
            'category' => 'required',
            'question_text' => 'required',
            'choice_a_text' => 'required',
            'choice_b_text' => 'required',
            'choice_c_text' => 'required',
            'choice_d_text' => 'required',
            'correct_answer' => 'required',
            'created_by' => 'required',
            // no images yet
        ]);
        $question = Question::create($fields);
        return $question;
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return $question;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $fields = $request->validate([
            'category' => 'required',
            'question_text' => 'required',
            'choice_a_text' => 'required',
            'choice_b_text' => 'required',
            'choice_c_text' => 'required',
            'choice_d_text' => 'required',
            'correct_answer' => 'required',
            'created_by' => 'required',
        ]);
        $question->update($fields);
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return ['Message' => 'Question successfully deleted'];
    }
}
