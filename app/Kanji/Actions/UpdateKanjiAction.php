<?php

namespace App\Kanji\Actions;

use App\Kanji\DTOs\KanjiDTO;
use App\Kanji\Queries\KanjiQueries;
use Inertia\Inertia;
use Inertia\Response;

class UpdateKanjiAction
{

    public function __construct(
        private readonly KanjiQueries $kanjiQueries
    ) {
    }

    public function execute(KanjiDTO $dto): Response
    {
        $kanji = $this->kanjiQueries->getById($dto->id);

        $kanji->character = $dto->character;
        $kanji->meaning = $dto->meaning;
        $kanji->onyomi = $dto->onyomi;
        $kanji->kunyomi = $dto->kunyomi;
        $kanji->important_reading = $dto->importantReading;
        $kanji->level = $dto->level;

        $kanji->save();
        $kanji->refresh();

        return Inertia::render('Kanji/KanjisShow', [
            'kanji' => $kanji,
            'radicals' => $kanji->radicals,
        ]);
    }

}
