<?php

$date1 = "2021-06-23";
$date2 = "2021-6-23";

$dateTimestamp1 = strtotime($date1);
$dateTimestamp2 = strtotime($date2);

if ($dateTimestamp1 > $dateTimestamp2) {
    echo "date1 mayor\n";
} else if ($dateTimestamp2 > $dateTimestamp1) {
    echo "date2 mayor\n";
} else {
    echo "son iguales\n";
}
