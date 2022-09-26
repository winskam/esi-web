<?php

// namespace App\Http\Controllers;

// class TodoCtrl extends Controller
// {
//     public function index()
//     {
//         // Plus tard, on ira chercher l'info dans une BD
//         $todos = ["acheter du lait", "apprendre Laravel", "rendre le projet"];
//         return view('todo', ['todos' => $todos]);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Todo1;

class TodoCtrl extends Controller
{
    public function index()
    {
        $todos = Todo1::findAll();
        return view('todo', compact("todos"));
    }

    public function infoId($id) {
        $todo = Todo1::findId($id);
        return view('todo1', compact("todo"));
    }
}
