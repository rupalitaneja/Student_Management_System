<?php

namespace App;
use DB;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'adminId';
    public $incrementing = false;

    public function store_data(Request $request)
    {
        $admin->adminId=$request->input('adminId');
        $admin->Name=$request->input('Name');
        // $admin->Email=$request->input('Email');
        $admin->number=$request->input('number');
        $admin->Address=$request->input('Address');
        $admin->save();  
    }
    public function show_details()
    {
        $admins = Admin::leftJoin('users','users.id', '=' , 'admins.adminId')
        ->paginate(2);
        return $admins;
    }

    public function edit_details($id)
    {
        $admins = Admin::leftJoin('users', 'admins.adminId', '=', 'users.id')->get();
        return $admins;
 
    }
    public function update_admin($adminid)
    {
        $admin= Admin::find($adminid);  
        $admin->name=$request->input('name');
        // $admin->email=$request->input('email');
        $admin->number=$request->input('number');
        $admin->Address=$request->input('Address');
        $admin->save();
    }
    public function search($search)
    {
        $student = Student::leftJoin('users','users.id', '=' , 'students.Sid')
        ->where('users.name', 'LIKE', '%' . $search . '%')
        ->paginate(2);
        return $student;
    }

    public function search_teacher($search)
    {

        $teacher = DB::table('users')
        ->Join('teachers', 'teachers.Tid', '=', 'users.id')
        ->where('users.name', 'LIKE', '%' . $search . '%')
        ->get();

        return $teacher;
    }

}

