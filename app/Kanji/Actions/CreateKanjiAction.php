<?php

namespace App\Kanji\Actions;

use App\Http\Requests\KanjiRequest;
use App\Kanji\Queries\KanjiQueries;
use Illuminate\Database\Eloquent\Model;

class CreateKanjiAction
{
    public function __construct(
        private readonly KanjiQueries $kanjiQueries
    ) {
    }

    public function execute(KanjiRequest $request): ?Model
    {
        return $this->kanjiQueries->createKanji($request);
    }

}
