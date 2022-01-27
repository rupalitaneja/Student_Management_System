<?php

namespace App;

use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $primaryKey = 'Sid';
    public $incrementing = false;

    public function displayStudents()
    {
        $students = Student::leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        return $students;
    }

    // public function display_details_to_students()
    // {
    //     $students = Students::table('students')
    //     ->leftJoin('users', 'students.Sid', '=', 'users.id')
    //     ->paginate(2);
    //     return $students;
    // }

    public function storeData($input)
    {
        $student=new self();
        $student->Sid=$input['Sid'];
        $student->name=$input['name'];
        $student->number=$input['number'];
        $student->birth=$input['birth'];
        $student->class=$input['class'];
        $student->address=$input['address'];
        $student->course_id=$input['course_id'];
        $student->mentor=$input['mentor'];
        $student->save();
        // return $student;
        
    }

    public function updateDetails($input, $Sid)
    {
        $student=self::find($Sid);
        $student->name=$input['name'];
        $student->number=$input['number'];
        $student->birth=$input['birth'];
        $student->class=$input['class'];
        $student->address=$input['address'];
        $student->course_id=$input['course_id'];
        $student->mentor=$input['mentor'];
        $student->save();
        // return $student;
    }

    public function search($search)
    {
        $student = Student::leftJoin('users','users.id', '=' , 'students.Sid')
        ->where('users.name', 'LIKE', '%' . $search . '%')
        ->paginate(2);
        return $student;
    }

    public function findStudent($id)
    {
        $student= Student::find($id);
        return $student;
    }

    public function deleteStudent($id)
    {
        $student=self::find($id);
        $student->delete();
    }
}

