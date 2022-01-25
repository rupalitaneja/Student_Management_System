<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Validate;
use App\Student;
use App\User;
use App\Admin;
use App\Teachers;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }
    
    const ROLE_ADMIN = 3;
    const ROLE_TEACHER= 2;
    const ROLE_STUDENT= 1;

    public function check()
    {
    $role = Auth::user()->role;
            if ($role == self::ROLE_ADMIN) {

                return view('admin.home');

                // return view('admin.home');
            } else if($role == self::ROLE_TEACHER ) {
                return view('teacher.home');
            }
            else if($role == self::ROLE_STUDENT) {
                return view('student.details');
            }
            else{
                return view('home');
            }
        }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function show_profile()
    {
        $role = Auth::user()->role;
        $id= Auth::user()->id;
    
        if ($role == self::ROLE_ADMIN) 
        {
            $admins= Admin::find($id);  
            $user= User::find($id);  
            return view('admin.showDetails', compact('admins'),compact('user')); 
        } 
        else if($role ==self::ROLE_TEACHER ) 
        {
            $teachers= Teachers::find($id);  
            $user= User::find($id);  
            return view('teachers.showDetails', compact('teachers'),compact('user')); 
        }
        else if($role ==self::ROLE_STUDENT) 
        {
            $students= Student::find($id);  
            $user= User::find($id);  
            return view('student.showDetails', compact('students'),compact('user')); 
        }
        else
        {
            return view('home');
        }
    }
}
