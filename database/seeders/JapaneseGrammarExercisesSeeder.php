<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JapaneseGrammarExercisesSeeder extends Seeder
{
    public function run()
    {
        $exerciseId1 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => 'あしたかあさって来きてください。B：それでは（＿＿＿）。',
            'answer' => 'あした',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId1, 'text' => 'あした', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId1, 'text' => 'きょう', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId1, 'text' => 'きのう', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
