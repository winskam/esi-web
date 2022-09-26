<?php

namespace App\Models;

use App\Http\Controllers\TodoCtrl;
use \Illuminate\Support\Facades\DB; // sans cela, PDO serait interprété comme \App\Models\PDO
class Todo1
{
    public static function findAll()
    {
        // $pdo = new PDO(
        //     "mysql:host=localhost;dbname=TodoDB;charset=utf8",
        //     "root",
        //     "",
        //     [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        // );
        // $todos = $pdo->query("select name from todos")
        //     ->fetchAll(PDO::FETCH_COLUMN);
        // return $todos;

        $result = DB::select("select * from todos");
        return $result;
    }

    public static function findId($id) {
        $result = DB::select("select * from todos where id = :id", ["id"=>$id]);
        return $result;
    }
}