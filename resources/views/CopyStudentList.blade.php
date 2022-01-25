<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  
</head>
<body>
  <style>
    .card-title{
      font-size: xxx-large;
      font-size: xxx-large;
    font-family: -webkit-body;
    background-color: beige;
    width: 100%;
    text-align: center;
    }
    .btn-warning {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.table{
  align-items: center;
}
.h5{
    width: 70%;
    text-align: -webkit-center;

}
.td{
  white-space: pre;
}
    </style>

<div class="container">
  <br><br>
   @include("search")
    <h5 class="card-title">List of all students</h5>
    <!-- <p class="card-text">All information about students</p> -->
    <br><br><br>
    <table class="table">
  <thead class="thread-lite">
  <tr>
      <th scope="col">Roll Number</th>
      <th scope="col">Name </th>
      <th scope="col">Email Address</th>
      <th scope="col">Number</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Class</th>
      <th scope="col">Address</th>
      <th scope="col">Course</th>
      <th scope="col">Mentor Assigned</th>

    </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
                <tr>
                    <td>{{ $student->Sid }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->birth }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->course_id }}</td>
                    <td>{{ $student->mentor }}</td>
                    <td>
                        <a href="{{ url('/edit/'.$student->Sid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/deleteS/'.$student->Sid) }}" class="btn btn-sm btn-warning">Delete</a>
                    </td>


                </tr>
            @endforeach
  </tbody>
</table>
{{$students->links()}}
 
</div>
</body>
</html>