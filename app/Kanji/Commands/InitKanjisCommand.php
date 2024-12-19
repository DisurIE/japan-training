<?php

namespace App\Kanji\Commands;

use App\Helpers\JsonHandler;
use Illuminate\Console\Command;


class InitKanjisCommand extends Command
{
    protected $signature = 'kanji:init';

    protected $description = 'Init Kanjis';

    public function handle(): void
    {
        JsonHandler::addKanjisToDatabaseFromJson("kanjis.json");
        JsonHandler::addRelationshipsRadicalsKanjis("radicals.json");
    }
}
