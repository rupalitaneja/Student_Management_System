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

        DB::beginTransaction();
        try{
            $teacher1=new Teachers();
            $teacher = $teacher1->store_details($request);
    
            $user=new User();
            $user1= $user->store_details_teacher($request);
                
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

    
        DB::beginTransaction();
        try{
            $teacher = new Teachers();
            $teacher->update_details($request, $Tid);

            $user1=new User();
            $users = $user1->update_teacher_details($request, $Tid);
                
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
    public function destroy($Tid)
    {
        DB::beginTransaction();
        try{
            $teacher=Teachers::find($Tid);  
            $teacher->delete();  

            $user1=User::find($Rid);  
            $user1->delete(); 
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home'); 
    }
}
