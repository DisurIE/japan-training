<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JapaneseGrammarExerciseOption extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_id', 'option_text'];

    public function exercise(){
        return $this->belongsTo(JapaneseGrammarExercise::class, 'exercise_id');
    }
}
