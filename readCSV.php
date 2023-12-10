<?php
function readCSV($filename) {
    $csvData = [];
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $header = str_getcsv(array_shift($lines));

    // Combine multiline entries into a single line
    $combinedLines = [];
    $currentLine = '';
    foreach ($lines as $line) {
        if (substr_count($line, '"') % 2 === 1) {
            $currentLine .= $line;
        } else {
            $combinedLines[] = $currentLine . $line;
            $currentLine = '';
        }
    }

    foreach ($combinedLines as $line) {
        $values = str_getcsv($line);
        
        // Adjust the array lengths
        $valuesCount = count($values);
        $headerCount = count($header);

        if ($valuesCount < $headerCount) {
            $values = array_pad($values, $headerCount, '');
        } elseif ($valuesCount > $headerCount) {
            $values = array_slice($values, 0, $headerCount);
        }

        $csvData[] = array_combine($header, $values);
    }

    return $csvData;
}
?>

