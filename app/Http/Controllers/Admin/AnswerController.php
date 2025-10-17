<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
        $answers = Answer::all();
        $questions=Question::all();
        return view('admin.answers.index', compact('answers','questions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //  $questions = Question::whereNull('question_text')->get();
        $answers = Answer::all();
        $questions = Question::whereNotIn('id', function ($query) {
         $query->select('question_id')->from('answers');
        })->get();

         return view('admin.answers.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|exists:questions,id',
            'answer' => 'required|string|max:255',
        ]);

        Answer::create([
            'question_id' => $validated['question'],
            'answer_text' => $validated['answer'],
        ]);

        return redirect()->route('admin.answers.index')->with('success', 'Answer saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $answer = Answer::with('question')->findOrFail($id);
        $questions = Question::all(); // To populate the question dropdown, if needed

        return view('admin.answers.edit', compact('answer', 'questions'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string|max:255',
            'next_question_id' => 'nullable|exists:questions,id',
        ]);

        $answer = Answer::findOrFail($id);
        $answer->update($validated);

        return redirect()->route('admin.answers.index')->with('success', 'Answer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $answer = Answer::findOrFail($id);  // Find the answer or throw 404 if not found
        $answer->delete();                  // Delete the found answer

        return redirect()->route('admin.answers.index')->with('success', 'Answer deleted.');
    
    }
}
