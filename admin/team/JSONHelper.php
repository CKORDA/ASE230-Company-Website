<?php
// JSONHelper.php

class JSONHelper
{
    private static $filePath =  __DIR__ . '/../../data/team.json';

    public static function readJSON()
    {
        $jsonString = file_get_contents(self::$filePath);
        return json_decode($jsonString, true);
    }

    public static function writeJSON($data)
    {
        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(self::$filePath, $jsonString);
    }
}
?>