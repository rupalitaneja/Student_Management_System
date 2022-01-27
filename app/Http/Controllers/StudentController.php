<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Support\Facades\Input;
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
        $students=$student1->displayStudents();
        return view('student.index',compact('students'));
    }
    // public function indexStudent()
    // {
    //     $students=$student1->display();
    //     return view('student.StudentList',['students'=>$students,'layout'=>'index']);
    // }

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
            $inputArray = [
                'Sid' => Input::get('Sid'),
                'email' => Input::get('email'),
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'birth' => Input::get('birth'),
                'class' => Input::get('class'),
                'address' => Input::get('address'),
                'course_id' => Input::get('course_id'),
                'mentor' => Input::get('mentor'),
            ];

            $student1 = new Student();
            $students = $student1->storeData($inputArray);

            $user1=new User();
            $users = $user1->storeDetailsStudent($inputArray);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return Redirect('/home');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($Sid)
    // {
    //     $student=Student::find($Sid);
    //     $student=Student::all();
    //     return view('student',['students'=>$student,'student'=>$student,'layout'=>'show']);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student1=new Student();
        $student = $student1->findStudent($id);
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
            $inputArray = [
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'birth' => Input::get('birth'),
                'class' => Input::get('class'),
                'address' => Input::get('address'),
                'course_id' => Input::get('course_id'),
                'mentor' => Input::get('mentor'),
            ];
            $student1=new Student();
            $students = $student1->updateDetails($inputArray, $Sid);

            $user1=new User();
            $users = $user1->updateDetails($inputArray, $Sid);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return Redirect('/home');
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
            $student1= new Student();
            $student1->deleteStudent($id);
         
            $user1=new User();  
            $user1->deleteUser($id); 
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return Redirect('/home');  
    }

    public function searchStudent(Request $request)
    {
        $search = $request->input('search');
        $student1 = new Student();
        $student = $student1->search($search);
        if($student->count() > 0)
            return view('student.searchResult')->withDetails($student)->withQuery ( $search );
        else
            return \Redirect::back()->with('success','No record found!!');
    }
}
