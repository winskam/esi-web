<?php

var_dump($_POST);
foreach($_POST['cars'] as $car) {
    echo $car;    
}
