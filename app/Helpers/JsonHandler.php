<?php

namespace App\Helpers;

use App\Models\Kanji;
use App\Models\Radical;
use Illuminate\Support\Facades\File;
class JsonHandler
{
    private const CHUNK_SIZE = 50;

    public static function addKanjisToDatabaseFromJson(string $path): void
    {
        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        $arrayKanjis = self::getArrayFromJsonKanjis($json);
        echo '<pre>';
        print_r($arrayKanjis);
        echo '</pre>';
        $chunkedData = array_chunk($arrayKanjis, self::CHUNK_SIZE);

        foreach ($chunkedData as $chunk) {
            Kanji::query()->insertOrIgnore($chunk);
        }
    }

    private static function getArrayFromJsonKanjis($json) : array
    {
        $array = array();
        foreach ($json as $k => $v) {
            $arr = [];
            $arr['character'] = $k;
            $arr['meaning'] = implode(", ", $v['meanings']);
            $arr['onyomi'] = implode(", ", $v['readings_on']);
            $arr['kunyomi'] = implode(", ", $v['readings_kun']);
            $arr['important_reading'] = 'onyomi';
            $arr['level'] = $v['wk_level'];
            $array[] = $arr;
        }
        return $array;
    }
    private static function getArrayFromJsonRadicals($json) : array
    {
        $array = array();
        foreach ($json as $k => $v) {
            $arr = [];
            $arr['character'] = $k;
            $arr['strokes'] = $v['strokes'];
            $arr['meaning'] = explode("(",$v['meaning_reading'])[0];
            $arr['reading'] = substr(explode("(",$v['meaning_reading'])[1], 0, -1);
            $arr['kanjis'] = $v['kanjis'];

            $array[] = $arr;
        }
        return $array;
    }
    public static function addRadicalsToDatabaseFromJson(string $path) : void
    {
        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        $arrayRadicals = self::getArrayFromJsonRadicals($json);

        $chunkedData = array_chunk($arrayRadicals, self::CHUNK_SIZE);

        foreach ($chunkedData as $chunk) {
            Radical::query()->insert($chunk);
        }
        echo "Успех\n";
    }

    public static function addRelationshipsRadicalsKanjis() : void
    {
        Radical::query()->with('kanjis')->each(function (Radical $radical) {
            $kanjiCharacters = explode(" ", $radical->kanjis);

            $kanjiIds = Kanji::query()->whereIn('character', $kanjiCharacters)->pluck('id')->toArray();

            $radical->kanjis()->sync($kanjiIds);
        });
        echo "Успех\n";
    }
}
