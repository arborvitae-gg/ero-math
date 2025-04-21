<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    // return all questions
    public function index()
    {
        return Question::all();
    }

    // create new question
    public function store(QuestionRequest $request)
    {
        $question = Question::create([...$request->validated(), 'created_by' => auth()->id()]);

        // Attach choices
        foreach ($request->choices as $choice) {
            $question->choices()->create($choice);
        }

        return response()->json([
            'question' => $question,
            'choices' => $question->choices,
        ], 201);
    }

    // show specific question
    public function show(Question $question)
    {
        return $question;
    }

    // edit question
    public function update(QuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->update($request->validated());

        // Delete existing choices and recreate
        $question->choices()->delete();
        foreach ($request->choices as $choice) {
            $question->choices()->create($choice);
        }

        return response()->json([
            'question' => $question,
            'choices' => $question->choices,
        ]);
    }

    // delete question
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();
        return response()->noContent(); // 204 status
    }
}
