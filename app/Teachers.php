<?php

namespace App;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $primaryKey = 'Tid';
    public $incrementing = false;

    public function viewAllTteachers()
    {
        $teachers = Teachers::leftJoin('users', 'teachers.Tid', '=', 'users.id')
        ->paginate(2);
        return $teachers;
    }


    public function storeDetails($input)
    {
        
        $teacher = new self();
        $teacher->Tid=$input['Tid'];
        $teacher->name=$input['name'];
        $teacher->number=$input['number'];
        $teacher->designation=$input['designation'];
        $teacher->course_id=$input['course_id'];
        $teacher->speciality=$input['speciality'];
        $teacher->save();
    }

    public function updateDetails(Request $request, $Tid)
    {
        $teacher=self::find($Tid);
        $teacher->name=$input['name'];
        $teacher->number=$input['number'];
        $teacher->designation=$input['designation'];
        $teacher->speciality=$input['speciality'];
        $teacher->save();
    }

    public function search($search)
    {
        $teacher = Teachers::leftJoin('users','users.id', '=' , 'teachers.Tid')
        ->where('users.name', 'LIKE', '%' . $search . '%')
        ->paginate(2);
        return $teacher;
    }

    public function findTeacher($id)
    {
        $teacher= Teachers::find($id);
        return $teacher;
    }

    public function deleteTeacher($id)
    {
        $student=self::find($id);
        $student->delete();
    }

}
