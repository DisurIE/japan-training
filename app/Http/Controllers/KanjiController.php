<?php

namespace App\Http\Controllers;

use App\Helpers\JsonHandler;
use App\Http\Requests\KanjiRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Kanji;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use function Laravel\Prompts\alert;

class KanjiController extends Controller
{
    public function index(Kanji $kanjis) : Response
    {
        //JsonHandler::addKanjisToDatabaseFromJson("kanjis.json");
        //JsonHandler::addRelationshipsRadicalsKanjis("radicals.json");
        return Inertia::render('Kanji/Kanjis', [
            'kanjis' => $kanjis->all()
        ]);
    }

    public function show(Kanji $kanji) : Response
    {
       // dd(Kanji::find($kanji->id)->radicals()->orderBy('id')->get());
        return Inertia::render('Kanji/KanjisShow', [
            'kanji' => $kanji,
            'radicals' => Kanji::find($kanji->id)->radicals()->orderBy('id')->get(),
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Kanji/KanjisCreate');
    }
    public function store(KanjiRequest $request) : mixed
    {

        $isCreated = $request->validated();
        if($isCreated) {
            return redirect()->route('kanjis.index')->with('success', 'Kanji created succesfully');
        }
        else{
            return alert(500);
        }
    }

    public function edit(Kanji $kanji)
    {
        return Inertia::render('Kanji/KanjisCreate', [
            'kanji' => $kanji,
        ]);
    }

    public function update(KanjiRequest $request) : mixed
    {
        //dd($request);

//        return abort(500);
        $kanji = Kanji::where('character', '=', $request['character'])->first();
        $isUpdated = $kanji->update($request->validated());
        if($isUpdated) {
            return redirect()->route('kanjis.index')->with('success', 'Kanji created succesfully');
        }
        else{
            ////////////////////////////////////////
            return abort(500);
        }
    }

}
