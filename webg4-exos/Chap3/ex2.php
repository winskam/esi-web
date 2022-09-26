<?php

function swap(int &$a, int &$b) {
    $c = $a;
    $a = $b;
    $b = $c;
}

$a = 2; $b = 3;
echo "a = $a, b = $b<br>";
swap($a, $b);
echo "a = $a, b = $b<br>";
