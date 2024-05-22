<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProfileKanjisController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $levels = Kanji::select('level')->distinct()->orderBy('level', 'asc')->pluck('level');
        //dd($levels);
        return Inertia::render('DashboardKanjis', [
            'levels' => $levels
        ]);
    }
    public function show($level)
    {
        $kanjisByLevel = Kanji::where('level', $level)->get();
        foreach ($kanjisByLevel as $key => $kanji){
            $kanjisByLevel[$key]['meaning'] = explode(', ', $kanji->meaning);
        }
        return Inertia::render('DashboardKanjisShow', [
            'learnedKanjis' => Auth::user()->learned_kanjis,
            'allKanjis' => DB::table('kanjis')->count(),
            'kanjisByLevel' => $kanjisByLevel,
            'level' => $level
        ]);
    }
    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $kanji = Kanji::where('character', $request->kanji)->first();

        $record = DB::table('user_kanji_progress')
            ->where('user_id', Auth::user()->id)
            ->where('kanji_id', $kanji->id)
            ->first();

        if ($record) {
            // Увеличиваем значение поля progress на 1
            DB::table('user_kanji_progress')
                ->where('user_id', Auth::user()->id)
                ->where('kanji_id', $kanji->id)
                ->increment('progress', 1);
        }
        else{
            $userNow = Auth::user();
            $userNow->learned_kanjis += 1;
            $userNow->save();
          $user->kanjiProgress()->attach($kanji->id, ['progress' => 1]);
        }
    }

}
