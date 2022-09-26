<?php

namespace App\Http\Controllers;

use App\Models\Pae;
use App\Models\Student;

class PaeCtrl extends Controller
{
    function students($id = null)
    {
        if ($id == null) {
            $result = Student::all();
        } else {
            $result = Student::get($id);
        }
        return response()->json($result); // ou,→ json_encode($result)
    }

    function accueil() {
        $students = Student::all();
        return view('accueil', compact("students"));
    }

    function getDetails($id) {
        $details = Pae::get($id);
        return response()->json($details);
    }

    function deleteDetails($id, $course) {
        Pae::deleteDetails($id, $course);

    }
}
