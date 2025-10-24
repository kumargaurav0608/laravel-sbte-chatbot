<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function start()
    {
        $categories = Category::whereNull('parent_id')->orderBy('order')->get(['id', 'name']);
        return response()->json([
            'reply' => 'Hello! How can I help you? Please choose a category:',
            'categories' => $categories,
        ]);
    }

    public function respond(Request $request)
    {
        // Step 1: User selects a category → return root questions
        if ($request->has('categoryId')) {
            $questions = Question::where('category_id', $request->categoryId)
                ->whereNull('parent_question_id')
                ->orderBy('order')
                ->get(['id', 'question_text']);
            
            return response()->json([
                'reply' => 'Please choose a question:',
                'questions' => $questions,
            ]);
        }

        // Step 2: User selects a question → return sub-questions or answer
        if ($request->has('questionId')) {
            $questionId = $request->questionId;

            // First, check if the question has sub-questions
            $subQuestions = Question::where('parent_question_id', $questionId)
                ->orderBy('order')
                ->get(['id', 'question_text']);

            if ($subQuestions->isNotEmpty()) {
                return response()->json([
                    'reply' => 'Please choose a sub-question:',
                    'questions' => $subQuestions,
                ]);
            }

            // If no sub-questions, check if it has an answer
            $answer = Answer::where('question_id', $questionId)->first();
            if ($answer) {
                return response()->json([
                    'reply' => $answer->answer_text,
                    'askMore' => true, // flag for more question 
                ]);
            }

            // If no sub-questions or answer
            return response()->json([
                'reply' => 'Sorry, no further information available for this question.',
            ]);
        }

        return response()->json([
            'reply' => 'Sorry, I did not understand that.',
        ]);
    }
}
