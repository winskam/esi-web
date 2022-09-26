<?php
require 'Controller/Action.php';

function routeRequest() {
    define("DEFAULT_ACTION", "allMessages");
    $action = isset($_GET['action']) ? $_GET['action'] : DEFAULT_ACTION;
    try {
        if (function_exists($action)) {
            $action();
        } else {
            require "View/Error.php";    
        }
    } catch (Exception $e) {
        require "View/Error.php";
    }
}
