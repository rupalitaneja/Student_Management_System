<?php

namespace App;
use DB;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function store_details_student(Request $request)
    {
        $user= new User();
        $user->id=$request->input('Sid');
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt('secret');
        $user->role=1;
        $user->save();
    }
    public function store_details_admin(Request $request)
    {
        $user = new User();
        $user->id=$request->input('adminId');
        $user->name=$request->input('Name');
        $user->email=$request->input('Email');
        $user->password = bcrypt('secret');
        $user->role=3;
        $user->save();
    
    }

    public function store_details_teacher(Request $request)
    {
        $user1 = new User();
        $user1->id=$request->input('Tid');
        $user1->name=$request->input('name');
        $user1->email=$request->input('email');
        $user1->password = bcrypt('secret');
        $user1->role=2;
        $user1->save();
    }

    public function update_details(Request $request, $id)
    {
        $user=User::find($id);
        $user->name=$request->input('name');
    }

    public function update_teacher_details(Request $request, $id)
    {
        $user=User::find($id);
        $user->name=$request->input('name');
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
