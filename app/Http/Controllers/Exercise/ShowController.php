<?php

namespace App\Http\Controllers\Exercise;

use App\Http\Controllers\Controller;
use App\Models\JapaneseGrammarExercise;
use Inertia\Inertia;

class ShowController extends Controller
{
    public function __invoke($level)
    {
        $exercises = JapaneseGrammarExercise::with('options')->where('level', $level)->get();

        return Inertia::render('DashboardSentencesShow', [
            'level' => $level,
            'exercises' => $exercises,
        ]);
    }
}
