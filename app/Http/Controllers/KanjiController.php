<?php

namespace App\Http\Controllers;

use App\Helpers\JsonHandler;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Kanji;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class KanjiController extends Controller
{
    public function index(Kanji $kanjis) : Response
    {
        //JsonHandler::addKanjisToDatabaseFromJson("kanjis.json");
        return Inertia::render('Kanji/Kanjis', [
            'kanjis' => $kanjis->all()
        ]);
    }

    public function show(Kanji $kanji) : Response
    {
        return Inertia::render('Kanji/KanjisShow', [
            'kanji' => $kanji,
            'radicals' => $kanji->radicals(),
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Kanji/KanjisCreate');
    }
    public function store(Request $request)
    {
        $request->validate([
            'character' => ['required', 'unique:kanjis'],
            'meaning' => 'required',
            'onyomi' => 'required',
            'kunyomi' => 'required',
            'important_reading' => 'required',
            'level' => ['required', 'numeric'],
        ]);
        $create = Kanji::create([
            'character' => request('character'),
            'meaning' => request('meaning'),
            'onyomi' => request('onyomi'),
            'kunyomi' => request('kunyomi'),
            'important_reading' => request('important_reading'),
            'level' => request('level'),
        ]);
        if($create) {
            return redirect()->route('kanjis.index')->with('success', 'Kanji created succesfully');
        }
        else{
            return redirect()->route('kanjis.create')->with('error', 'Kanji not created');
        }
    }
}
