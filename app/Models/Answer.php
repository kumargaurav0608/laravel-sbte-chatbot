<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'answer_text', 'next_question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function nextQuestion()
    {
        return $this->belongsTo(Question::class, 'next_question_id');
    }
}
