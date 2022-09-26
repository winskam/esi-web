<?php 
function racine(int $x, int $n = 2) {
    if ($n==0) {
        throw new InvalidArgumentException("N cannot ");
    }
    return pow($x, 1/$n);
}
try {
echo racine(25) . "<br>";
echo racine(125, 3);
} catch(Exception $e) {
    echo $e;
}