<?php

namespace App\Kanji\Resources;

use Carbon\Carbon;

class KanjiResource
{
    public int $id;

    public string $character;

    public string $meaning;

    public string $onyomi;
    public string $kunyomi;
    public string $importantReading;

    public int $level;

    public ?Carbon $createdAt;
    public ?Carbon $updatedAt;
}
