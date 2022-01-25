<?php

namespace App;

use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $primaryKey = 'Sid';
    public $incrementing = false;

    public function display()
    {
        $students = DB::table('students')
        ->leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        return $students;
    }

    public function display2()
    {
        $students = DB::table('students')
        ->leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        return $students;
    }

    public function store_data(Request $request)
    {
        $student=new Student();
        $student->Sid=$request->input('Sid');
        $student->name=$request->input('name');
        $student->number=$request->input('number');
        $student->birth=$request->input('birth');
        $student->class=$request->input('class');
        $student->address=$request->input('address');
        $student->course_id=$request->input('course_id');
        $student->mentor=$request->input('mentor');
        $student->save();
        
    }

    public function update_details(Request $request, $Sid)
    {
        $student=Student::find($Sid);
        $student->name=$request->input('name');
        $student->number=$request->input('number');
        $student->birth=$request->input('birth');
        $student->class=$request->input('class');
        $student->address=$request->input('address');
        $student->course_id=$request->input('course_id');
        $student->mentor=$request->input('mentor');
        $student->save();
    }
}

