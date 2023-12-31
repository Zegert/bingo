<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo?!</title>
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }

        .blue {
            color: blue;
        }
    </style>
</head>

<body>

<form method="get">
    <input type="text" name="new" id="new" placeholder="[35,81]" value="[35]">
    <input type="submit" value="Check nummers">
</form>

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
        16 => [12, 80, 10, 97, 20, 50, 87, 94, 32, 51],
        17 => [34, 92, 94, 60, 13, 74, 6, 23, 29, 22],
        18 => [26, 13, 61, 56, 57, 7, 37, 24, 33, 6],
        19 => [10, 60, 7, 31, 74, 89, 46, 26, 13, 80],
        20 => [86, 24, 99, 31, 89, 22, 23, 47, 2, 80],
        21 => [75, 7, 60, 85, 97, 68, 5, 1, 80, 30],
        22 => [79, 82, 47, 85, 97, 61, 1, 12, 80, 30],
        23 => [2, 99, 86, 85, 97, 1, 13, 60, 80, 30],
    ];

    $numbersArray = [
        1, 2, 3, 5, 6, 7, 9,
        10, 12, 13, 18,
        20, 21, 22, 23, 24, 26, 27, 28,
        31, 32, 33, 34, 36, 37, 38,
        40, 41, 46, 47, 48, 49,
        51, 52, 53, 54, 56, 58,
        60, 61, 62, 63, 64, 67, 68,
        70, 72, 74, 75, 77, 78, 79,
        82, 86, 87, 89,
        90, 95, 96, 98, 99
    ];

    $url = parse_url("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    parse_str($url['query'], $query);
    if (isset($query['new']) && !empty($query['new'])) {
        $newNumbers = json_decode($query['new']) ?? [];
        
        if (!is_array($newNumbers)) {
            unset($newNumbers);
        }
    }

    foreach ($cardsArray as $cardNumber => $card) {
        $count = 0;
        echo 'Kaart:' . $cardNumber . ' | ';

        foreach ($card as $number) {
            $class = 'red';
            if (in_array($number, $numbersArray)) {
                $count++;
                $class = 'green';
            } elseif (isset($newNumbers) && in_array($number, $newNumbers)) {
                $count++;
                $class = 'blue';
            }

            echo '<span class="' . $class . '">' . $number . '</span> - ';
        }

        if ($count === 10) {
            echo 'Bingo!';
        } else {
            echo 'Nog ' . (10 - $count) . ' te gaan.';
        }

        echo '<br>';
    }

    ?>
</body>
</html>
