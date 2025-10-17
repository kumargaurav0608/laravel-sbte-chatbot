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
        // User selected a category, return questions
        if ($request->has('categoryId')) {
            $questions = Question::where('category_id', $request->categoryId)
                ->orderBy('order')
                ->get(['id', 'question_text']);
            return response()->json([
                'reply' => 'Please choose an option:',
                'questions' => $questions,
            ]);
        }

        // User selected a question, return answer and next question if any
        if ($request->has('questionId')) {
            $answer = Answer::where('question_id', $request->questionId)->first();
            if (!$answer) {
                return response()->json(['reply' => 'Sorry, no information available.']);
            }
            $nextQuestion = null;
            if ($answer->next_question_id) {
                $next = Question::find($answer->next_question_id);
                $nextQuestion = $next ? ['id' => $next->id, 'text' => $next->question_text] : null;
            }
            return response()->json([
                'reply' => $answer->answer_text,
                'nextQuestion' => $nextQuestion,
            ]);
        }

        return response()->json(['reply' => 'Sorry, I did not understand that.']);
    }
}
