<?php

namespace App\Http\Controllers;

class HelloCtrl extends Controller
{
    // public function index()
    // {
    //     //return 'hello world from controller :)';
    //     return view('hello');
    // }

    public function index($name) {
        return view('hello', ['name'=>$name]);
        }
}
