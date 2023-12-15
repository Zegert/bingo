<?php

$cardsArray = [
    1 => [12, 54, 35, 87, 2, 46, 38, 23, 62, 75],
    2 => [3, 41, 13, 27, 99, 74, 62, 23, 19, 12],
    3 => [3, 98, 68, 5, 1, 63, 85, 53, 30, 11],
    4 => [3, 5, 13, 7, 12, 33, 85, 53, 30, 11],
    5 => [3, 77, 61, 1, 13, 60, 85, 53, 30, 11],
    6 => [3, 2, 10, 27, 22, 62, 51, 47, 19, 21],
    7 => [3, 85, 86, 66, 61, 1, 13, 60, 7, 37],
    8 => [3, 85, 47, 66, 77, 61, 1, 12, 34, 70],
    9 => [32, 39, 66, 62, 24, 12, 47, 74, 23, 2],
    10 => [32, 89, 99, 31, 2, 74, 10, 9, 13, 23],
    11 => [1, 96, 40, 78, 23, 19, 47, 53, 9, 80],
    12 => [32, 51, 99, 92, 42, 12, 47, 74, 23, 71],
    13 => [6, 51, 13, 88, 57, 99, 2, 60, 62, 22],
    14 => [61, 67, 1, 13, 99, 19, 60, 53, 38, 80],
    15 => [10, 60, 7, 14, 74, 89, 46, 44, 13, 75],
];

$numbersArray = [
    1, 2, 5, 6, 7, 9, 10, 12, 21, 22,
    23, 24, 26, 28, 32, 33, 37, 38, 40, 41,
    46, 47, 49, 54, 56, 58, 60, 61, 67, 70,
    72, 74, 75, 77, 86, 87, 89, 90, 95, 96
];

$url = parse_url("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
parse_str($url['query'], $query);
$newNumbers = json_decode($query['new_items']) ?? [];

foreach ($cardsArray as $cardNumber => $card) {
    $count = 0;
    echo 'Kaart:' . $cardNumber . ' | ';

    foreach ($card as $number) {
        if (in_array($number, $numbersArray)) {
            $count++;

            if (empty($newNumbers)) {
                echo $number . ' - ';
            }
        }

        if (in_array($number, $newNumbers)) {
            echo $number . ' - ';
        }
    }

    if ($count === 10) {
        echo 'Bingo!';
    } else {
        echo 'Nog ' . (10 - $count) . ' te gaan.';
    }

    echo '<br>';
}
