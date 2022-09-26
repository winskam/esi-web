<?php
function mymax(...$nb) {
    return max($nb);
}
?>
<?= mymax(3,2,7,12,4) ?>
