<?php

function placeVal(array &$tab, int $nb) {
    $tab[$nb] = $nb;
}

$tab = [1, 2, 3];
placeVal($tab, 8);
echo count($tab);
echo"<br>";
var_dump($tab);
