<?php

$url = "https://www.digilabs.cz/hiring/data.php";
$response = file_get_contents($url);
$data = json_decode($response, true);




$filteredData = [];
foreach ($data as $record) {
    if (preg_match('/^(\d+) \+ (\d+) = (\d+)$/', $record['calculation'], $matches)) {
        if ($matches[1] + $matches[2] == $matches[3]) {
            $filteredData[] = $record;
        }
    }
}

foreach ($filteredData as $record) {
    echo "<b>Name:</b><br>".$record['name'] . "<br><br><b>Calculation:</b><br>" . $record['calculation'] . "<br><br><hr>";
}
