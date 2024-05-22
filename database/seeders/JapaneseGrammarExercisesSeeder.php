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


        $exerciseId2 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => 'お金が（＿＿＿）ある。',
            'answer' => 'ほしい',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId2, 'text' => 'いらない', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId2, 'text' => 'ほしい', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId2, 'text' => 'ある', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId2, 'text' => 'ない', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $exerciseId3 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => 'この靴は（＿＿＿）。',
            'answer' => '新しい',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId3, 'text' => '古い', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId3, 'text' => '新しい', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId3, 'text' => '大きい', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId3, 'text' => '小さい', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $exerciseId4 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => 'これは私の（＿＿＿）です。',
            'answer' => 'かばん',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId4, 'text' => 'はな', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId4, 'text' => 'じてんしゃ', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId4, 'text' => 'ほん', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId4, 'text' => 'かばん', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $exerciseId5 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => '山田さんは毎日（＿＿＿）。',
            'answer' => 'バスで通学します',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId5, 'text' => '電車で帰ります', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId5, 'text' => '車で買い物します', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId5, 'text' => 'バスで通学します', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId5, 'text' => '歩いて働きます', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $exerciseId6 = DB::table('japanese_grammar_exercises')->insertGetId([
            'text' => 'あなたは（＿＿＿）ですか。',
            'answer' => '学生',
            'level' => 'N5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('japanese_grammar_exercise_options')->insert([
            ['exercise_id' => $exerciseId6, 'text' => '会社員', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId6, 'text' => '先生', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId6, 'text' => '医者', 'created_at' => now(), 'updated_at' => now()],
            ['exercise_id' => $exerciseId6, 'text' => '学生', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
