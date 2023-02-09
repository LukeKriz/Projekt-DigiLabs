<?php

$url = "https://www.digilabs.cz/hiring/data.php";
$response = file_get_contents($url);
$data = json_decode($response, true);

usort($data, function ($a, $b) {
    return strcmp($a["name"], $b["name"]);
});

$current_letter = '';
foreach ($data as $record) {
    $first_letter = strtoupper(substr($record['name'], 0, 1));
    if ($first_letter !== $current_letter) {
        echo '<br><hr><b style="font-size:1.5rem;margin-left:1rem">' . $first_letter . '</b><br><hr><br>';
        $current_letter = $first_letter;
    }
    echo $record['name'] . '<br>';
}