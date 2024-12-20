<?php

namespace App\Kanji\Queries;

use App\Models\Kanji;
use App\Http\Requests\KanjiRequest;
use Illuminate\Database\Eloquent\Collection;

class KanjiQueries
{
    public function createKanji(KanjiRequest $request): ?Kanji
    {
        return Kanji::create($request->validated());
    }

    public function getById(int $id): ?Kanji
    {
        return Kanji::whereId($id)->first();
    }

    public function getAll(): Collection
    {
        return Kanji::query()->get();
    }
}
