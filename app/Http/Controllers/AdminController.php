<?php
namespace App\Http\Controllers;
use App\Admin;
use App\User;
use DB;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $admin1 = new Admin();
        $admins= $admin1->show_details();
        return view('admin.index', compact('admins'));  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'Name'=>'required',
            'Email' => 'required|email']);
        DB::beginTransaction();
        try{
            $admin=new Admin();
            $admin1 = $admin->store_data($request);
            $user=new User();
            $user1=$user->store_details_admin($request);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home');  
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
        $admin1= new Admin();
        $admins=$admin->edit_details($id);
        return view('admin.edit', compact('admins'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminid)
    {
        
        DB::beginTransaction();
        try{
            $admin=new Admin();
            $admin1 = $admin->update_admin($adminid);

            $user1=new User();
            $users = $user1->update_admin($adminid);
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return view('admin.home')->with('message','Student created successfully');
        // $user=User::find();
        // $user->Name=$request->input('Name');
        // $user->Email=$request->input('Email');
        // $user->password = bcrypt('secret');
        // $user->role=0;
        // $user->save();
       return redirect('/home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adminid)
    {
        $admin=Admin::find($adminid);  
        $admin->delete();  
        return view('admin.home');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        $admin = new Admin();
        $student = $admin->search($search);
        if($student->count() > 0)
            return view('student.searchResult')->withDetails($student)->withQuery ( $search );
        else
            return \Redirect::back()->with('success','No record found!!');
    }

    public function search_teacher(Request $request)
    {

        $search = $request->input('search');
        //create object of Admin model
        $admin = new Admin();
        //call search method of Admin model
        $teacher = $admin->search($search);
        if($teacher->count() > 0)
            return view('teacher.searchResult')->withDetails($teacher)->withQuery ($search);
    else
            return \Redirect::back()->with('success','No record found!!');
    }
} 

