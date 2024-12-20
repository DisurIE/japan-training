<?php

namespace App\Kanji\Factories;

use App\Kanji\DTOs\KanjiDTO;
use App\Common\Factories\AbstractFactory;

class KanjiUpdateFactory extends AbstractFactory
{

    public static function getDTO(): KanjiDTO
    {
        return new KanjiDTO();
    }
}
