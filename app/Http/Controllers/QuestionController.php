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
    public function store(QuestionRequest $request)
    {
        $question = Question::create([...$request->validated(), 'created_by' => auth()->id()]);

        // Attach choices
        foreach ($request->choices as $choice) {
            $question->choices()->create($choice);
        }

        return response()->json([ // ✅ JSON response
            'question' => $question,
            'choices' => $question->choices,
        ], 201);
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
    public function update(QuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->update($request->validated());

        // Delete existing choices and recreate
        $question->choices()->delete();
        foreach ($request->choices as $choice) {
            $question->choices()->create($choice);
        }

        return response()->json([ // ✅ JSON response
            'question' => $question,
            'choices' => $question->choices,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();
        return response()->noContent(); // ✅ 204 status
    }
}
