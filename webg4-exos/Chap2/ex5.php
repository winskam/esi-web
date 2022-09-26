<?php
$fruits = array("Apple", "Banana", "Orange", "Pineapple");
$i = 0;
echo "<table border=1>";
while ($i < count($fruits)) {
    echo "<tr><td>$fruits[$i]</td></tr>";
    $i++;
}
echo "</table>";

echo "<table border=1>";
$i = 0;
do {
    echo "<tr><td>$fruits[$i]</td></tr>";
    $i++;
} while ($i < count($fruits));
echo "</table>";

echo "<table border=1>";
for ($i = 0; $i < count($fruits); $i++) {
    echo "<tr><td>$fruits[$i]</td></tr>";
}
echo "</table>";

echo "<table border=1>";
foreach ($fruits as $i) {
    echo "<tr><td>$i</td></tr>";
}
echo "</table>";
