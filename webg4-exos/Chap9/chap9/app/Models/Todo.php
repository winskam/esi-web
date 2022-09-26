<?php

namespace App\Models;

class Todo
{
    public static function findAll()
    {
        return [
            "acheter du lait",
            "apprendre Laravel",
            "rendre le projet"
        ];
    }
}
