<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JapaneseGrammarExercise extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_text', 'correct_answer', 'level'];

    public function options()
    {
        return $this->hasMany(JapaneseGrammarExerciseOption::class, 'exercise_id');
    }
}
