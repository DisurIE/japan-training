<?php

namespace App\Kanji\DTOs;

use App\Common\DTOs\AbstractDTO;

class KanjiDTO extends AbstractDTO
{
    public int $id;

    public string $character;

    public string $meaning;

    public string $onyomi;
    public string $kunyomi;
    public string $importantReading;

    public int $level;
}
