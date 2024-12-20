<?php

namespace App\Kanji\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\KanjiRequest;
use App\Kanji\Actions\CreateKanjiAction;
use App\Kanji\Actions\UpdateKanjiAction;
use App\Kanji\Factories\KanjiUpdateFactory;
use App\Kanji\Presenters\KanjiPresenter;
use App\Common\Exceptions\PresentNotFoundException;
use App\Kanji\Queries\KanjiQueries;
use App\Models\Kanji;
use Inertia\Inertia;
use Inertia\Response;

class KanjiController extends Controller
{
    public function __construct(
        private readonly KanjiQueries $kanjiQueries,
        private readonly KanjiPresenter $kanjiPresenter
    ) {
    }

    /**
     * @throws PresentNotFoundException
     */
    public function index() : Response
    {
        return Inertia::render('Kanji/Kanjis', [
            'kanjis' => $this->kanjiPresenter->collection($this->kanjiQueries->getAll())
        ]);
    }

    public function show(Kanji $kanji) : Response
    {
        return Inertia::render('Kanji/KanjisShow', [
            'kanji' => $kanji,
            'radicals' => $kanji->radicals,
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Kanji/KanjisCreate');
    }
    public function store(KanjiRequest $request, CreateKanjiAction $action) : Response
    {
        return Inertia::render('Kanji/KanjisCreate', [
            'kanji' => $action->execute($request)
        ]);
    }

    public function edit(Kanji $kanji): Response
    {
        return Inertia::render('Kanji/KanjisCreate', [
            'kanji' => $kanji,
        ]);
    }

    public function update(KanjiRequest $request, UpdateKanjiAction $action) : mixed
    {
        $dto = KanjiUpdateFactory::fromRequest($request);

        return $action->execute($dto);
    }

}
