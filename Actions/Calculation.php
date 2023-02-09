<?php

$url = "https://www.digilabs.cz/hiring/data.php";
$response = file_get_contents($url);
$data = json_decode($response, true);




usort($data, function($a, $b) {
    return $a['firstNumber'] <=> $b['firstNumber'];
});

foreach ($data as $item) {
    if ($item['firstNumber'] % 2 === 0 && $item['firstNumber'] / $item['secondNumber'] === $item['thirdNumber']) {
        echo "<b>Name:</b> " . $item['name'] . '<br><br>' . PHP_EOL ;
        echo "<b>First number: </b> " . $item['firstNumber'] . '<br>' . PHP_EOL ;
        echo "<b>Second number: </b> " . $item['secondNumber'] . '<br>' . PHP_EOL ;
        echo "<b>Third number: </b> " . $item['thirdNumber'] . '<br>' . PHP_EOL ;
        
        echo "<br><b>Calculation:</b> <br>" .  $item['firstNumber'], ' / ', $item['secondNumber'], ' = ', $item['thirdNumber'], PHP_EOL;
        echo('<br><hr><br>');
    }
}