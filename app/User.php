<?php

namespace App;
use DB;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 3;
    const ROLE_TEACHER= 2;
    const ROLE_STUDENT= 1;

    public function storeDetailsStudent($input)
    {
        $user1= new self();
        $user1->id=$input['Sid'];
        $user1->name=$input['name'];
        $user1->email=$input['email'];
        $user1->password = bcrypt('secret');
        $user1->role=self::ROLE_STUDENT;
        $user1->save();
    }
    public function storeDetailsAdmin($input)
    {
        $user1 = new self();
        $user1->id=$input['adminId'];
        $user1->name=$input['name'];
        $user1->email=$input['email'];
        $user1->password = bcrypt('secret');
        $user1->role=self::ROLE_ADMIN;
        $user1->save();
    
    }

    public function storeDetailsTeacher($input)
    {
        $user1 = new self();
        $user1->id=$input['Tid'];
        $user1->name=$input['name'];
        $user1->email=$input['email'];
        $user1->password = bcrypt('secret');
        $user1->role=self::ROLE_TEACHER;
        $user1->save();
    }

    public function updateDetails($input, $id)
    {
        $user=self::find($id);
        $user->name=$input['name'];
        $user->save();
    }

    public function deleteUser($id)
    {
        $user=self::find($id);
        if($user == null)
        return false;
    else
    {
        $user->delete();
        return true;
    }
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
