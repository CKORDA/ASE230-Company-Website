<?php
function readJSON($filename) {
    $jsonString = file_get_contents($filename);
    return json_decode($jsonString, true);
}
?>
