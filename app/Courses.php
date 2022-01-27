<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $primaryKey = 'Cid';
    public $incrementing = false;

    public function get()
    {
        $course = Courses::all()->pluck("name","Cid");
        return $course;
    }
}
