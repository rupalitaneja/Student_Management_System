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
    margin-left: 25%;
    }
    .btn-warning {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.table{
  align-items: center;
}
    </style>
  <div class="container">
    <h5 class="card-title">List of all courses</h5><br><br>
    <!-- <p class="card-text">All information about courses</p> -->
    <table class="table">
  <thead class="thread-lite">
    <tr>
      <th scope="col">Course ID</th>
      <th scope="col">Course Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
                <tr>
                    <td>{{ $course->Cid }}</td>
                    <td>{{ $course->name }}</td>
                    
                    <td>

                        <a href="{{ url('/editC/'.$course->Cid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/deleteC/'.$course->Cid) }}" class="btn btn-sm btn-warning">Delete</a>
                    </td>
                </tr>
            @endforeach
  </tbody>
</table>
{{$courses->links()}}
</div>
</body>
</html>
