<?php

namespace App;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $primaryKey = 'Tid';
    public $incrementing = false;

    public function view_all()
    {
        $teachers = DB::table('teachers')
        ->leftJoin('users', 'teachers.Tid', '=', 'users.id')
        ->paginate(2);
        return $teachers;
    }

    public function store_details()
    {
        $teacher = new Teachers();
        $teacher->Tid=$request->input('Tid');
        $teacher->name=$request->input('name');
        $teacher->number=$request->input('number');
        $teacher->designation=$request->input('designation');
        $teacher->course_id=$request->input('course_id');
        $teacher->speciality=$request->input('speciality');
        $teacher->save();
    }

    public function update_details(Request $request, $Tid)
    {
        $teacher=Teachers::find($Tid);
        $teacher->name=$request->input('name');
        $teacher->number=$request->input('number');
        $teacher->designation=$request->input('designation');
        $teacher->speciality=$request->input('speciality');
        $teacher->save();
    }
}
