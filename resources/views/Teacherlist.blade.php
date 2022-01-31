<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
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
  @include("teacher.search")
    <h5 class="card-title">List of Teachers</h5>
    <!-- <p class="card-text">All information about Teachers</p> -->
    <table class="table">
  <thead class="thread-lite">
    <tr>
      <th scope="col">Teacher Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">number</th>
      <th scope="col">designation</th>
      <th scope="col">Speciality</th>
<br><br>
    </tr>
  </thead>
  <tbody>
  @foreach($teachers as $teacher)
      <tr>
        <td>{{ $teacher->Tid }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->email }}</td>
        <td>{{ $teacher->number }}</td>
        <td>{{ $teacher->designation }}</td>
        <td>{{ $teacher->speciality }}</td>
        <td>
            <a href="{{ url('/editT/'.$teacher->Tid) }}" class="btn btn-sm btn-warning">Edit</a>
            
            <a href="{{ url('/deleteT/'.$teacher->Tid) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-warning">Delete</a>
            <input name="_method" type="hidden" value="DELETE">
        </td>
      </tr>
  @endforeach
  </tbody>
</table>
{!! $teachers->render() !!}
</div>