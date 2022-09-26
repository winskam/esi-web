<?php

function map(array &$tab, $carre) {
    for ($i = 0; $i < count($tab); $i++) {
        $tab[$i] = $carre($tab[$i]);
    }
}

$tab = [5, 10, -1];
var_dump($tab);
echo "<br>";
$carre = function($x) {return $x**2;};
map($tab,$carre);
var_dump($tab);
?>
