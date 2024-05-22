<?php

namespace App\Http\Controllers\Exercise;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ShowController extends Controller
{
    public function __invoke($name)
    {
        return Inertia::render('DashboardSentencesShow', [
            'name' => $name
        ]);
    }
}
