<?php

namespace App\Http\Controllers\Exercise;

use App\Http\Controllers\Controller;
use App\Models\JapaneseGrammarExercise;
use App\Models\Level;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('DashboardSentences', [
            'levels' => JapaneseGrammarExercise::getEnumValues('getEnumValues')
        ]);
    }
}
