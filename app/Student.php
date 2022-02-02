<?php

namespace App;

use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =['Sid','email','name','number','address','course_id','mentor','birth'];
    protected $primaryKey = 'Sid';
    public $incrementing = false;

    public function displayStudents()
    {
        $students = Student::leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        return $students;
    }

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
        if($student == null)
            return false;
        else
        {
            $student->delete();
            return true;
        }
    }

    public function getRecords($page_number,$page_size)
    { //to do: negation
        // if($page_size == null)
        //     $page_size = 3;
        $total_pages = ceil(self::count()/$page_size);
        // error_log($total_pages);
        // error_log(self::count());
        if($page_number<0 || $page_number==null)
        {
        $page_number=1;
        }
        else if(is_float($page_number))
        {
            $page_number=(int)($page_number);  //floor
        }
        $student = self::select('users.id','users.name','students.course_id')
        ->leftJoin('users', 'users.id', '=', 'students.Sid')
        ->offset($page_number)
        ->limit($page_size)
        ->get();
        return $student;
        // $student=self::select('users.id','users.name','students.course_id')->leftJoin('users', 'users.id', '=', 'students.Sid')
        // ->get();
        // return $student;
    }

    public function findStudentById($id)
    {
        $findId = self::where('Sid',$id)->first();
        return $findId;
    }
}

