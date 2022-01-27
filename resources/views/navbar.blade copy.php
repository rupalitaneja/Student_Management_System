
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.dropbtn {
    background-color: #235e55;
    color: white;
    font-family: monospace;
    padding: 13px;
    width: 12%;
    align-items: center;
    font-size: 16px;
    border: none;
    border-radius: 6%;
    margin-left: 3%;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;
width: auto;
text-align: center;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<body>
    
</body>
</html>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <a class="navbar-brand" href="{{url('/')}}">Students Management</a> -->
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="navbarMain" id="navbarNavAltMarkup">
        <div class="">
            <div class="dropbtn">
        <a href="{{url('/viewDetails')}}">Your Details</a>
        </div><br><br>
            <div class="dropdown">
                <button class="dropbtn">Student</button>
                <div class="dropdown-content">
                    <a href="{{url('/createStudent')}}">Add New Student</a>
                    <a href="{{url('/viewStudent')}}">View all Student Details</a>
                </div>
                </div><br><br>
                <div class="dropdown">
                <button class="dropbtn">Teacher</button>
                <div class="dropdown-content">
                    <a href="{{url('/createTeacher')}}">Add new Teacher</a>
                    <a href="{{url('/viewTeacher')}}">View all Teacher Details</a>
                </div>
                </div><br><br>
                <div class="dropdown">
                <button class="dropbtn">Course</button>
                <div class="dropdown-content">
                    <a href="{{url('/createCourse')}}">Add new Course</a>
                    <a href="{{url('/viewCourse')}}">View all Courses Details</a>
                </div>
                </div><br><br>
                <div class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <a href="{{url('/createAdmin')}}">Add new Admin</a>
                    <a href="{{url('/viewAdmin')}}">View all Admin Details</a>
                </div>
                </div><br><br>
                </div><br><br>
               
                <a href="{{url('/changePassword')}}">Change Password</a>
        </div>
    </div>
</nav>