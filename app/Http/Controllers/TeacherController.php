<?php

namespace App\Http\Controllers;
use App\Teachers;
use Validator;
use DB;
use App\Courses;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teacher1= new Teachers();
        $teachers=$teacher1->view_all();
        return view('Teacherlist', compact('teachers')); 
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
        return view('Teacher',compact('course'),['layout'=>'create']);
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
            'Tid' => 'required',
            'email' => 'required|email', 
            'name' => 'required|min:4', 
            'number' => 'required', 
            'speciality' => 'required', 

        ]);
        $teacher1=new Teachers();
        $teacher = $teacher1->store_details($request);

        $user=new User();
        $user1= $user->store_details_teacher($request);
        
        return view('admin.home')->with('message','Student created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Tid)
    {
        $teacher=Teachers::find($Tid);
        return view('teacherEditDetails',['teacher'=>$teacher,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateT(Request $request, $Tid)
    {
        $teacher = new Teachers();
        $teacher->update_details($request, $Tid);
       
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Tid)
    {
        $teacher=Teachers::find($Tid);  
        $teacher->delete();  
        return redirect('/home');
    }
}
