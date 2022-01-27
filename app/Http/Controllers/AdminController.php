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
    public function index()
    { 
        $admin1 = new Admin();
        $admins= $admin1->showDetails();
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
        DB::beginTransaction();
        try{
            $inputArray = [
                'name' => Input::get('name'),
                'number' => Input::get('number'),
                'address' => Input::get('address'),
            ]; 

            $admin=new Admin();
            $admin1 = $admin->updateAdmin($inputArray, $adminId);

            $user1=new User();
            $users = $user1->updateDetails($inputArray, $adminId);
                
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
        DB::beginTransaction();
        try{
            $student1= new Student();
            $student->deleteAdmin($adminid);
         
            $user1=new User();  
            $user->deleteUser($adminid); 
                
        }catch(ValidationException $e){
            DB::rollback();
            throw $e;
        }
            DB::commit();
            return Redirect('/home');
    } 
} 

