<?php

$url = "https://www.digilabs.cz/hiring/data.php";
$response = file_get_contents($url);
$inputData = json_decode($response, true);





$currentDate = new DateTime();
$startDate = new DateTime();
$startDate->sub(new DateInterval('P1M'));
$endDate = new DateTime();
$endDate->add(new DateInterval('P1M'));

$filteredData = array_filter($inputData, function ($record) use ($startDate, $endDate) {
    $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $record['createdAt']);
    return $createdAt >= $startDate && $createdAt <= $endDate;
}); 

foreach ($filteredData as $data) {
    
    echo "<b>Name:<br></b>" . $data['name'] . "<br><br>";
    echo "<b>Date:<br></b>" . $data['createdAt'] .  "<br>";

    echo "<br><br><hr>";
}

?>