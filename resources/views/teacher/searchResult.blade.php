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
    <body>
<div class="container"><br><br>
    @if(isset($details))
        <p> The Search results are :</p>
    <!-- <h2>Sample User details</h2> --><br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Teacher Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">number</th>
            <th scope="col">designation</th>
            <th scope="col">Speciality</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $teacher)
            <tr>
                     <td>{{ $teacher->Tid }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->number }}</td>
                    <td>{{ $teacher->designation }}</td>
                    <td>{{ $teacher->speciality }}</td>
                    <td>
                        <a href="{{ url('/edit/'.$teacher->Tid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/deleteS/'.$teacher->Tid) }}" class="btn btn-sm btn-warning">Delete</a>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</body>
</html?