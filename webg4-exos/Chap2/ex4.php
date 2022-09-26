<?php
$t = date("H");

if ($t >= "4" && $t < "12") {
  echo "Bonne journée!";
} elseif ($t >= "12" && $t < "16") {
  echo "Bon après-midi!";
} elseif ($t >= "16" && $t < "20"){
  echo "Bonne soirée!";
} else {
    echo "Bonne nuit!";
}
?>
