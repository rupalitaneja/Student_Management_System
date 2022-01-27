<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/new.js"></script>
  
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
    </style>

  <div class="container"><br><br>
    <form action="{{route('searchName')}}" method="GET" role="search">
      <div class="input-group">
          <input type="text" class="form-control" name="search" id = "search"
              placeholder="Search users"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
          </span>
      </div>
  </form>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <h5 class="card-title">List of Students</h5>
   
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
<br><br>
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
                        <a href="{{ url('/deleteS/'.$student->Sid) }}" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                        <input name="_method" type="hidden" value="DELETE">
                    </td>


                </tr>
            @endforeach
  </tbody>
</table>

{!! $students->render() !!}

</div>
