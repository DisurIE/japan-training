<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\Level;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class ProfileKanjisController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $levels = Kanji::select('level')->distinct()->pluck('level');
        //dd($levels);
        return Inertia::render('DashboardKanjis', [
            'levels' => $levels
        ]);
    }
    public function show($level)
    {
        $kanjisByLevel = Kanji::where('level', $level)->get();
        return Inertia::render('DashboardKanjisShow', [
            'kanjisByLevel' => $kanjisByLevel
        ]);
    }
}
