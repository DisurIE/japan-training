<?php

namespace App\Http\Controllers\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\JapaneseGrammarExercise;
use App\Models\Kanji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        //dd(JapaneseGrammarExercise::where('id', $request['id'])->first()['answer']);

        if(strcasecmp($request['optionText'], Exercise::where('id', $request['id'])->first()['answer'])){
            dd("Неверный ответ");
        }
        $user = User::where('id', Auth::id())->first();
        $record = DB::table('exercises_users_progress')
            ->where('user_id', Auth::id())
            ->where('japanese_grammar_exercise_id', $request['id'])
            ->first();

        if ($record) {
            // Увеличиваем значение поля progress на 1
            DB::table('exercises_users_progress')
                ->where('user_id', Auth::id())
                ->where('japanese_grammar_exercise_id', $request['id'])
                ->increment('progress', 1);
        }
        else{
            $userNow = Auth::user();
            $userNow->learned_exercise += 1;
            $userNow->save();
            $user->japaneseGrammarExercisesProgress()->attach($request['id'], ['progress' => 1]);
            dd("Правильный ответ");
        }
    }
}
