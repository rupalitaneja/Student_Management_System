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
 
 <h5 class="card-title">List of all Admins</h5>
 <br><br><br>
<table class="table">  
<thead class="thread-lite">  
<tr>
      <th scope="col">Admin ID</th>
      <th scope="col">Name </th>
      <th scope="col">Email Address</th>
      <th scope="col">Number</th>
      <th scope="col">Address</th>

    </tr>
  </thead>  
<tbody>  
@foreach($admins as $admin)  
        <tr border="none">  
            <td>{{$admin->adminId}}</td>  
            <td>{{$admin->name}}</td>  
            <td>{{$admin->email}}</td>  
            <td>{{$admin->number}}</td>  
            <td>{{$admin->address}}</td>
<td >  
<!-- <a href="{{ url('/editA/'.$admin->adminId) }}" class="btn btn-sm btn-warning">Edit</a> -->
<a href="{{ url('/deleteA/'.$admin->adminId) }}" class="btn btn-sm btn-warning">Delete</a> 
</td>  
 
         </tr>  
@endforeach  
</tbody>  
</table>  
    {{$admins->links()}}
</body>
</html>