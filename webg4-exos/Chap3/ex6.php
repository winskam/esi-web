<?php

function sepParite (array $tab) {
    $newTab = [];
    foreach ($tab as $i) {
        if ($i % 2 == 0) {
            array_unshift($newTab, $i);
        } else {
            array_push($newTab, $i);
        }
    }
    return $newTab;
}

$tab = [1, 2, 3, 4, 7, 8, 9, 10, 23, 24, 31];
var_dump(sepParite($tab));
