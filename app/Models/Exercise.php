<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_text',
        'correct_answer',
        'level'
    ];

    public function options()
    {
        return $this->hasMany(ExerciseOption::class, 'exercise_id');
    }
    public static function getEnumValues($field): array
    {
        $levels = DB::select("SHOW COLUMNS FROM japanese_grammar_exercises WHERE Field = 'level'");

        preg_match("/^enum\('(.*)'\)$/", $levels[0]->Type, $matches);
        return explode("','", $matches[1]);
    }
}
