<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JapaneseGrammarExercise extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_text', 'correct_answer', 'level'];

    public function options()
    {
        return $this->hasMany(JapaneseGrammarExerciseOption::class, 'exercise_id');
    }
    public static function getEnumValues($field)
    {
        $levels = DB::select("SHOW COLUMNS FROM japanese_grammar_exercises WHERE Field = 'level'");

        preg_match("/^enum\('(.*)'\)$/", $levels[0]->Type, $matches);
        $enumValues = explode("','", $matches[1]);
        return $enumValues;
    }
}
