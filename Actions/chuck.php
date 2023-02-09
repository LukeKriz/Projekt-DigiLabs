<?php

$url = "https://www.digilabs.cz/hiring/data.php";
$response = file_get_contents($url);
$jokes = json_decode($response, true);

// Vybrat náhodný vtip s délkou 120 znaků nebo méně
$shortJokes = array_filter($jokes, function ($joke) {
    return strlen($joke["joke"]) <= 120;
});
$randomJoke = $shortJokes[array_rand($shortJokes)]["joke"];

// Rozdělit vtip na poloviny (bez rozdělení slov)
$firstHalf = "";
$secondHalf = "";
$jokeLength = strlen($randomJoke);
$splitPoint = (int)($jokeLength / 2);

$splitArray = [".",","];

$splitFound = false;
for ($i = $splitPoint; $i >= 0; $i--) {
    if (in_array($randomJoke[$i], $splitArray)) {
        $splitFound = true;
        $splitPoint = $i + 1;
        break;
    }
}

if (!$splitFound) {
    for ($i = $splitPoint; $i < $jokeLength; $i++) {
        if ($randomJoke[$i] == ' ') {
            $splitPoint = $i;
            break;
        }
    }
}

$firstHalf = substr($randomJoke, 0, $splitPoint);
$secondHalf = substr($randomJoke, $splitPoint + 1);



// Vytvořit meme
echo '<div style="width:1060px">';
echo '<img src="https://www.digilabs.cz/hiring/chuck.jpg">';
echo '<br>';
echo '<p style="text-align:center; width:1060px; font-size:25px; text-transform:uppercase; color:white; position:absolute; top:8%; transform:translateY(-50%)">' . $firstHalf . '</p>';
echo '<br>';
echo '<p style="text-align:center; font-size:25px;text-transform:uppercase;top:90%; color:white; position:absolute; bottom:0; width:1060px">' . $secondHalf . '</p>';
?>