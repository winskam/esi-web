<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Pae
{

    public $id;
    public $title;
    public $credits;

    public function __construct($id, $title, $credits)
    {
        $this->id = $id;
        $this->title = $title;
        $this->credits = $credits;
    }

    public static function get($student)
    {
        $details = array();
        $result = DB::select("select course.id, course.title, course.credits from program join course on program.course = course.id where student = :id", ["id" => $student]);
        foreach ($result as $course) {
            array_push($details, new Pae($course->id, $course->title, $course->credits));
        }
        return $details;
    }

    public static function deleteDetails($student, $course) {
        DB::delete("delete from program where student = :student and course = :course" , ["student" => $student, "course" => $course]);
    }

}
