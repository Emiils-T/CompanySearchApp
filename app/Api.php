<?php

namespace App;

class Api
{
    public static function getApi(string $baseDir,string $query): string
    {
        $filePath = $baseDir."/api/api.json";
        $data= json_decode(file_get_contents($filePath));

        return str_replace('$query', $query,$data);
    }
}
