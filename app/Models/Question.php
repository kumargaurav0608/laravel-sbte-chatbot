<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['category_id', 'question_text', 'order'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
