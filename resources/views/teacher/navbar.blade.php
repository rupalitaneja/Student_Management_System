<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styleDashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student Management System</title>
</head>
<style>
    .navbar-nav>li>a {
    padding-top: 14px;
    padding-bottom: 14px;
    margin-top: -390%;
    margin-right: 10%;
    width: 100%;
}
.btnnew{
    color: white;
    border: 5px solid #858b92;
    font-weight: bold;
    align-items:center;
    /* font-size: x-large; */
    /* padding: 30px; */
    padding: 10px;
    /* padding-right: 35%; */
    border-bottom: thick;
    display: -webkit-inline-box;
  
  .member{
    text-align: end;
    font-size: x-large;
    font-family: 'Raleway';
    font-weight: bold;
        margin-bottom: 1.7%;
    margin-top: -1%;
}
.navbar-nav>li>.dropdown-menu {
    margin-top: -280;
    border-top-right-radius: 0;
    border-top-left-radius: 0;
}
.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    white-space: nowrap;
    padding-top: 14px;
    padding-bottom: 14px;
    margin-top: -300%;
    
}
    .dropdown{
        position: relative;
    display: block;
    /* background-color: #054f76; */
    color: aliceblue;
}.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #eee;
    border-color: #d7eefe;
    background-color: #31708f;
    color: aliceblue;
}
    }
    .container2{
        width: 300px; 
        margin-left: 0%;
        margin-top: -42%;
    }
   
    ul.nav2 {
  padding-left: 0px;
  padding: 2%;
  margin-left: -3%;
  background-color: #37474f;
  text-align: center;
  width: 140%;
  
}
ul.nav2 > li {
  display: inline-block;
  padding: 0px  8px;
}

ul.nav2 > li > a {
  color: white;
    
    margin-right: 0px;
    /* font-size: 100%; */
    align-content: end;
    font-family: revert;
    font-weight: bold;
    /* border: 2px solid black; */
  /* background-color: white; */
  background-color: #9ea1a7c2;
    /* border-radius: 20em; */
    color: black;
  padding: 10px 16px;
  font-size: 16px;
  width: 100%;
  cursor: pointer;
  
  text-decoration: none;
}

.btn {
  border: 2px solid black;
  /* background-color: white; */
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  radius: 20px;
}

/* Green */

.profile:hover {
  background-color:#7e9099;
  color: white;
}

    
</style>
<body>
    
</body>
</html>

<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="#">Student Management system</a>
    </header>
    <ul class="nav">
      <!-- <li>
        <a href="{{url('/createStudent')}}">
          <i class="zmdi zmdi-view-dashboard"></i> Add New Student
        </a>
      </li> -->
      <li>
        <a href="{{url('/viewStudent')}}">
          <i class="zmdi zmdi-link"></i> View All students
        </a>
      </li>
      <!-- <li>
        <a href="{{url('/createTeacher')}}">
          <i class="zmdi zmdi-widgets"></i> Add new Teacher
        </a>
      </li> -->
      <li>
        <a href="{{url('/viewTeacher')}}">
          <i class="zmdi zmdi-calendar"></i> View all Teacher Details
        </a>
      </li>
      <!-- <li>
        <a href="{{url('/createCourse')}}">
          <i class="zmdi zmdi-info-outline"></i> Add new Course
        </a>
      </li> -->
      <li>
        <a href="{{url('/viewCourse')}}">
          <i class="zmdi zmdi-settings"></i> View all Courses Details
        </a>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
    <!-- <nav class="navbar navbar-default"> -->
      <div class="container-fluid">
       <!-- <div class="STD"> STUDENT MANAGEMENT SYSTEM  </div> -->
        <div>
          <!-- <li><a href="#"></a></li> -->
          <div><ul class="nav2" style="list-style-type: none;" >
          <li class="nav">
           <!-- <a class="btn profile" aria-current="page" href="{{ url('/viewDetails') }}">Profile</a> -->
          </li>
          <li class="nav">
           <a class="btn profile" aria-current="page" href="{{ url('/changePassword') }}">Change Password</a>
          </li>
          <li class="nav">
            <a class="btn profile" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
            </li>
            <li class="dropdown">
                                <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <a class="btnnew" aria-current="page" href="{{ url('/viewDetails') }}">View Profile</a>
            
                              </li>
            
          </ul>

      </div>
    </nav>
    
   </div>
</div>
<br>
   
          <!-- <h1>Rest Content Here</h1> -->
      <p>
        <!-- Make sure to keep all page content within the 
        <code>#content</code>. -->
      </p>
    </div>
  </div>
</div>