<?php

namespace App\Http\Controllers;
use App\Student;
use Validator;
use App\User;
use DB;
use App\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student1 = new Student();
        $students=$student1->display();
        return view('student.index',compact('students'));
    }
    public function indexStudent()
    {
        $students=$student1->display();
        return view('student.StudentList',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course1 = new Courses();
        $course = $course1->get();
        return view('student',compact('course'),['layout'=>'create']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'Sid' => 'required',
            'email' => 'required|email', 
            'name' => 'required|min:4', 
            'number' => 'required', 
            'address' => 'required',
            'class' => 'required', 
            'birth' => 'required',
            'course_id' => 'required',
            'mentor' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $student1 = new Student();
            $students = $student1->store_data($request);

            $user1=new User();
            $users = $user1->store_details_student($request);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home')->with('message','Student created successfully');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Sid)
    {
        $student=Student::find($Sid);
        $student=Student::all();
        return view('student',['students'=>$student,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Sid)
    {
        $student=Student::find($Sid);

        return view('studentEditDetails',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Sid) 
    {
        DB::beginTransaction();
        try{
            $student1=new Student();
            $students = $student1->update_details($request, $Sid);

            $user1=new User();
            $users = $user1->update_details($request, $Sid);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home')->with('message','Student created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $student=Student::find($id);  
            $student->delete();  
            $user1=User::find($id);  
            $user1->delete(); 
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home');   
    }
}
