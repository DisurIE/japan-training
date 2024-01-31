<?php

use Illuminate\Support\Facades\File;

if (!function_exists('getKanjiFromJson')) {
    function getKanjiFromJson(string $path) : array {
        $contents = File::get(base_path($path));
        $json = json_decode($contents, true);
        foreach ($json as $k => $v) {

            //echo "<h1>" . $k . "</h1>";
            //echo '<br>';
            echo '<pre>';
            print_r($v['readings_on']);
            echo '</pre>';
        }

        return array();
    }
}
