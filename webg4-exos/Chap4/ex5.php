<?php
require_once('calendrier.php');
echo "Bonsoir " . htmlspecialchars($_GET["name"])
    . " "
    . htmlspecialchars($_GET["lastname"])
    . " ";
    $new_date = date('d-m', strtotime($_GET['date']));

    if ($new_date == date('d-m')) {
        echo "Joyeux anniversaire !";
    }
    showCalendar(date('n', strtotime($_GET['date'])),date('Y', strtotime($_GET['date'])) );