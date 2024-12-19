<?php

namespace App\Kanji\Queries;

use App\Http\Requests\KanjiRequest;
use App\Models\Kanji;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class KanjiQueries
{
    public function createKanji(KanjiRequest $request): ?Model
    {
        return Kanji::query()->create($request->validated());
    }

    public function getAll(): Collection
    {
        return Kanji::query()->get();
    }
}
