<?php

namespace App\Http\Controllers;
use App\Courses;

use Illuminate\Http\Request;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Courses::paginate(4);
        return view('Course',['courses'=>$courses,'layout'=>'index']);
    }

    public function course()
    {   
        return view('admin.student_course');
    }

    public function indexFull()
    {
        $course=Courses::all();
        return view('student',['course'=>$course,'layout'=>'create']);
        // return view('Course',['course'=>$course,'layout'=>'index']);
    }
    
    public function indexCourseToStudent()
    {
        $courses=Courses::paginate(2);
        return view('student.CourseList',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createC()
    {
        $courses=Courses::all();
        return view('Course',['courses'=>$courses,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeC(Request $request)
    {
        $course=new Courses();
        $course->Cid=$request->input('Cid');
        $course->name=$request->input('name');
        $course->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Cid)
    {
        $course=Courses::find($Sid);
        $course=Courses::all();
        return view('course',['Courses'=>$course,'course'=>$course,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Cid)
    {
        $course=Courses::find($Cid);
        //$students=Student::all();
        return view('Course',['course'=>$course,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Cid)
    {
        $course=Courses::find($Cid);
        $course->name=$request->input('name');
        $course->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Cid)
    {
        $course=Courses::find($Tid);  
        $course->delete();  
        return redirect('/home');
    }
}
