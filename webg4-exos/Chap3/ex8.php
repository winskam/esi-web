<?php

function numJour(string $jour) {
    static $jours = ["lundi" => 1, "mardi" => 2, "mercredi" => 3, "jeudi" => 4, "vendredi" => 5, "samedi" => 6, "dimanche" => 7 ];
    if (array_key_exists($jour, $jours)) {
        return $jours[$jour];
    } else {
        return -1;
    }
}

echo numJour("samedi");
