<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student
{

    public $id;
    public $name;
    public $credits;

    public function __construct($id, $name, $credits)
    {
        $this->id = $id;
        $this->name = $name;
        $this->credits = $credits;
    }

    public static function all()
    {

        $allStudents = array();
        $result = DB::select("select * from student");
        foreach ($result as $student) {
            $nbCredits = DB::select("select SUM(credits) as credits from course join program on course.id = program.course where student = :id", ["id" => $student->id]);
            if (is_null ($nbCredits[0]->credits)) {
                $nbCredits = 0;
            } else {
                $nbCredits = $nbCredits[0]->credits;
            }
            array_push($allStudents, new Student($student->id, $student->name, $nbCredits));
        }
        return $allStudents;
    }

    public static function get($id)
    {
        $student = self::all();
        return $student[$id];
    }
}
