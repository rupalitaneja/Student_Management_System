<?php
use App\Student;
use App\Teachers;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/newhome','HomeController@check');

// Route::get('/home','HomeController@index')->name('home');

Route::get('/home',"HomeController@check")->name('home');
//Students
Route::get('/createStudent',"StudentController@create");
Route::post('/store',"StudentController@store");
Route::get('/viewStudent','StudentController@index');
Route::get('/edit/{Sid}',"StudentController@edit");
Route::post('/updateS/{Sid}',"StudentController@update");
Route::get('/deleteS/{Sid}',"StudentController@destroy");
Route::get('/viewStudentList','StudentController@indexStudent');
Route::get('/viewCourseList','CourseController@indexCourse');

//Teachers
Route::get('/createTeacher',"TeacherController@create");
Route::post('/storeT',"TeacherController@store");
Route::get('/viewTeacher','TeacherController@index');
Route::get('/editT/{Tid}',"TeacherController@edit");
Route::post('/updateT/{Tid}',"TeacherController@updateT");
Route::get('/deleteT/{Tid}',"TeacherController@destroy");

//Courses
Route::get('/createCourse',"CourseController@createC");
Route::post('/storeC',"CourseController@storeC");
Route::get('/viewCourse','CourseController@index');
Route::get('/editC/{Cid}',"CourseController@edit");
Route::post('/updateC/{Cid}',"CourseController@update");

//Admin
Route::get('/createAdmin',"AdminController@create");
Route::post('/storeA',"AdminController@store");
Route::get('/viewAdmin','AdminController@index');
Route::get('/editA/{adminId}',"AdminController@edit");
Route::post('/updateA/{adminId}',"AdminController@update");
Route::post('/deleteA/{adminId}',"AdminController@destroy");
Route::get('/viewDetails',"HomeController@show_profile");


Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/search','StudentController@searchStudent')->name('searchName');
Route::get('/searchTeacher','TeacherController@searchTeacher')->name('searchTeacherName');
