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

        $course = DB::table('courses')->pluck("name","Cid");
        return $course;
    }
}
