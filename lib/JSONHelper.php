<?php
// JSONHelper.php

class JSONHelper
{
    private static $filePath;

    public static function readJSON()
    {
        $jsonString = file_get_contents(self::getFilePath());
        return json_decode($jsonString, true);
    }

    public static function writeJSON($data)
    {
        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(self::getFilePath(), $jsonString);
    }

    private static function getFilePath()
    {
        $currentDir = dirname(__FILE__);
        $filePath = $currentDir . '/../../../data/team.json;

        echo "Current Dir: $currentDir<br>";
        echo "File Path: $filePath<br>";

        return $filePath;
    }
}
?>
