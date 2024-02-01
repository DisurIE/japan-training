<?php

namespace App\Helpers;
use App\Models\Kanji;
use Illuminate\Support\Facades\File;
class JsonHandler
{
    public static function getKanjisFromJson(string $path)
    {
        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        $arrayKanjis = self::getArrayFromJson($json);
        echo '<pre>';
        print_r($arrayKanjis);
        echo '</pre>';
        $chunkedData = array_chunk($arrayKanjis, 25); // Разбиваем массив на части

        foreach ($chunkedData as $chunk) {
            Kanji::insert($chunk);
        }
    }

    private static function getArrayFromJson($json) : array
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

}
