<?php

use g55047\Calendar;

require "vendor/autoload.php"; ?>
    <form>
        <input type="number" name="month" placeholder="Mois">
        <input type="number" name="year" placeholder="Année">
        <button type="submit">Envoyer</button>
    </form>
<?php Calendar::showCalendar(isset($_GET['month']) ? $_GET['month'] : 10, isset($_GET['year']) ? $_GET['year'] : 1999); ?>
