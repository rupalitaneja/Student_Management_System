<?php

namespace App\Http\Controllers\API;

use App\Student;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Validator;
use App\Http\Controllers\Controller;

class StudentAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // http://localhost:8000/api/students?id={id}

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'id'=>'required', ]);
        if ($validator->fails()) {    
            return $this->sendError('Student ID is required');
        }

            $id=$request->input('id');
            $student1 = new Student();
            $result=$student1->findStudentById($id);
            if($result !=null){
                return $this->sendResponse($result,'Students retrieved successfully.');
            }
            else{
                return $this->sendError('failed to find the student');
            }

}
    // http://localhost:8000/api/getAll
    public function getAllStudents()
    {
        $student1= new Student();
        $students = $student1->getRecords();
        if($students == null)
             return $this->sendError('failed to find the student');
        else
            return $this->sendResponse($students, 'Students retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // http://localhost:8000/api/deleteById?id=18csu003
    public function deleteById(Request $request)
    {
            $id=$request->input('id');
        try{
            DB::beginTransaction();
            $student1= new Student();
            $temp = $student1->deleteStudent($id);
         
            $user1=new User();  
            $temp2= $user1->deleteUser($id); 

            if($temp==false || $temp2==false)
            {
                return $this->sendError('No record found');
            }
            else
            {
            DB::commit();
            return $this->sendResponseAfterDelete('Students deleted successfully.');
            }        
        }catch(Exception $e){
            DB::rollback();
            return $this->sendError('Something went wrong. Please try again');
        }
    }

    
}
