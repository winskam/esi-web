<?php

function insert(array &$tab, int $pos, int $val, int $rep) {
    $tabVal = array_fill(0, $rep, $val); //creation tableau avec x fois la valeur
    array_splice($tab, $pos, 0, $tabVal); //insertion tableau à bonne pos
    return $tab;
}

$tabl = [1, 2, 3, 4];
var_dump($tabl);
echo "<br>";
var_dump(insert($tabl, 2, 5, 7));
