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

    public function storeData($input)
    {
        $admin = new self();
        $admin->adminId=$input['adminId'];
        $admin->name=$input['name'];;
        $admin->number=$input['number'];
        $admin->address=$input['address'];
        $admin->save();  
    }
    public function showDetails()
    {
        $admins = Admin::leftJoin('users','users.id', '=' , 'admins.adminId')
        ->paginate(2);
        return $admins;
    }

    public function editDetails($id)
    {
        $admins = Admin::leftJoin('users', 'admins.adminId', '=', 'users.id')->get();
        return $admins;
 
    }
    public function updateAdmin($input, $adminId)
    {
        $admin= self::find($adminId);  
        $admin->name=$input['name'];
        $admin->number=$input['number'];
        $admin->Address=$input['address'];
        $admin->save();
    }

    public function deleteAdmin($id)
    {
        $admin=self::find($id);
        $admin->delete();
    }
}

