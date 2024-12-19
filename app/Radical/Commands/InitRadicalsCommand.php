<?php

namespace App\Radical\Commands;

use App\Helpers\JsonHandler;
use Illuminate\Console\Command;


class InitRadicalsCommand extends Command
{
    protected $signature = 'radical:init';

    protected $description = 'Init Kanjis';

    public function handle(): void
    {
        JsonHandler::addRadicalsToDatabaseFromJson("radicals.json");
    }
}
