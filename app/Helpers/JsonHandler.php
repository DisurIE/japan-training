<?php

namespace App\Helpers;
use App\Models\Kanji;
use Illuminate\Support\Facades\File;
class JsonHandler
{
    public static function addKanjisToDatabaseFromJson(string $path)
    {
        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        $arrayKanjis = self::getArrayFromJsonKanjis($json);
        echo '<pre>';
        print_r($arrayKanjis);
        echo '</pre>';
        $chunkedData = array_chunk($arrayKanjis, 25); // Разбиваем массив на части

        foreach ($chunkedData as $chunk) {
            Kanji::insert($chunk);
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
    private static function getArrayFromJsonRadicals($json)
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
    public static function addRadicalsToDatabaseFromJson(string $path)
    {

        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        $arrayRadicals = self::getArrayFromJsonRadicals($json);
        echo '<pre>';
        print_r($arrayRadicals);
        echo '</pre>';

    }
}
