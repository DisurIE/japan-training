<?php

namespace App\Kanji\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\KanjiRequest;
use App\Kanji\Actions\CreateKanjiAction;
use App\Kanji\Queries\KanjiQueries;
use App\Models\Kanji;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use function Laravel\Prompts\alert;

class KanjiController extends Controller
{
    public function __construct(
       private readonly KanjiQueries $kanjiQueries
    ) {
    }

    public function index() : Response
    {
            /*if(Cache::has('kanjis')){
                return Inertia::render('Kanji/Kanjis', [
                    'kanjis' => Cache::get('kanjis')
                ]);
            }*/
            $kanjis = $this->kanjiQueries->getAll();
            //Cache::put('kanjis', $kanjis, 3600);
            return Inertia::render('Kanji/Kanjis', [
                'kanjis' => $kanjis
            ]);
    }

    public function show(Kanji $kanji) : Response
    {
        return Inertia::render('Kanji/KanjisShow', [
            'kanji' => $kanji,
            'radicals' => Kanji::find($kanji->id)->radicals()->orderBy('id')->get(),
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Kanji/KanjisCreate');
    }
    public function store(KanjiRequest $request, CreateKanjiAction $action) : Model
    {
        return $action->execute($request);
    }

    public function edit(Kanji $kanji): Response
    {
        return Inertia::render('Kanji/KanjisCreate', [
            'kanji' => $kanji,
        ]);
    }

    public function update(KanjiRequest $request, Kanji $kanji) : mixed
    {
        try {
            $update = $kanji->update($request->validated());

            if ($update) {
                return redirect()->route('kanjis.edit', $kanji["character"])->with('success', 'Kanji updated successfully');
            } else {
                return redirect()->route('kanjis.edit', $kanji["character"])->with('error', 'Failed to update kanji');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('kanjis.edit', $kanji["character"])->with('error', 'An error occurred while updating kanji');
        }
    }

}
