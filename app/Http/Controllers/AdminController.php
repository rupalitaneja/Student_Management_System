<?php
namespace App\Http\Controllers;
use App\Admin;
use App\User;
use DB;
use Illuminate\Support\Facades\Input;
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
    public function index(Request $request)
    { 
        $admin1 = new Admin();
        $admins = $admin1->getRecords();
        if ($request->ajax()){
        return view('admin.index', compact('admins')); 
        } 
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

        try{
            DB::beginTransaction();
            $inputArray = [
                'adminId' => Input::get('adminId'),
                'email' => Input::get('email'),
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'address' => Input::get('address'),
            ];
            $admin=new Admin();
            $admin1 = $admin->storeData($inputArray);
            $user=new User();
            $user1=$user->storeDetailsAdmin($inputArray);
            DB::commit();
            return Redirect('/home'); 
                
        }catch(Exception $e){
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
        $admin1= new Admin();
        $admins=$admin->editDetails($id);
        return view('admin.edit', compact('admins'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminId)
    {
        $this->validate($request, [
            'Name'=>'required',
            'Email' => 'required|email']);
        try{
            DB::beginTransaction();
            $inputArray = [
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'address' => Input::get('address'),
            ]; 

            $admin=new Admin();
            $admin1 = $admin->updateDetail($inputArray, $adminId);

            $user1=new User();
            $users = $user1->updateDetails($inputArray, $adminId);
            DB::commit();
            return view('admin.home')->with('message','Student created successfully');
                
        }catch(Exception $e){
            DB::rollback();
            return Redirect()->back()->with('error','Something went wrong. Please try again'); 
        }
            
        // $user=User::find();
        // $user->Name=$request->input('Name');
        // $user->Email=$request->input('Email');
        // $user->password = bcrypt('secret');
        // $user->role=0;
        // $user->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adminid)
    {
        try{
            DB::beginTransaction();
            $student1= new Student();
            $student->deleteAdmin($adminid);
         
            $user1=new User();  
            $user->deleteUser($adminid);
            DB::commit();
            return Redirect('/home'); 
                
        }catch(ValidationException $e){
            DB::rollback();
            return Redirect()->back()->with('error','Something went wrong. Please try again'); 
        }
            
    } 
} 

