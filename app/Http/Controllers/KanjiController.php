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
        return Inertia::render('Kanjis', [
            'kanjis' => $kanjis->all()
        ]);
    }

    public function show(string $id) : Response
    {
        $kanji = Kanji::where("character", "=" , $id)->first();
        return Inertia::render('KanjisShow', [
            'kanji' => $kanji,
            'radicals' => $kanji->radicals(),
        ]);
    }
}
