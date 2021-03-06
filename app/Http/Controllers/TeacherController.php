<?php

namespace App\Http\Controllers;
use App\Teachers;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;
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

    public function index(Request $request)
    {
        $teacher1 = new Teachers();
        $teachers= $teacher1->getRecords();
        if ($request->ajax()) {
            return view('Teacherlist', compact('teachers'));
        }
        return view('Teacherlist',compact('teachers'));
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

        try{
            DB::beginTransaction();
            $inputArray = [
                'Tid' => Input::get('Tid'),
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'number' => Input::get('number'),
                'designation' => Input::get('designation'),
                'course_id' => Input::get('course_id'),
                'speciality' => Input::get('speciality'),
            ];

            $teacher1=new Teachers();
            $teacher = $teacher1->storeDetails($inputArray);
    
            $user=new User();
            $user1= $user->storeDetailsTeacher($inputArray);
            DB::commit();
            return Redirect('/home');
                
        }catch(ValidationException $e){
            DB::rollback();
            return Redirect()->back()->with('error','Something went wrong. Please try again'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher1=new Teachers();
        $teacher = $teacher1->findTeacher($id);
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
        try{
            $this->validate($request, [
                'Tid' => 'required',
                'email' => 'required|email', 
                'name' => 'required|min:4', 
                'number' => 'required', 
                'speciality' => 'required', 
            ]);
            DB::beginTransaction();
            $inputArray = [
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'designation' => Input::get('designation'),
                'speciality' => Input::get('speciality'),
            ];
            $teacher = new Teachers();
            $teacher->updateDetails($inputArray, $Tid);

            $user1=new User();
            $users = $user1->updateDetails($inputArray, $Tid);
            DB::commit();
            return Redirect('/home');
        }catch(ValidationException $e){
            DB::rollback();
            return Redirect()->back()->with('error','Something went wrong. Please try again'); 
        }
            
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
            $teacher1=new Teachers();
            $teacher1->deleteTeacher($id);  

            $user1=new User();  
            $user1->deleteUser($id); 
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return Redirect('/home');
    }

    public function searchTeacher(Request $request)
    {

        $search = $request->input('search');
        $teacher1 = new Teachers();
        $teacher = $teacher1->searchUser($search);
        if($teacher->count() > 0)
            return view('teacher.searchResult')->withDetails($teacher)->withQuery ($search);
    else
            return \Redirect::back()->with('success','No record found!!');
    }
}
