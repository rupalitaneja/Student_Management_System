<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
    
</head>
<style>
    .btnfamily{
    color: white;
    font-size: x-large;
    font-family: -webkit-pictograph;
    font-weight: bold;
    background-color: black;
    align-items: center;
    margin-left: 19%;
    width: 30%;
}
.btnfamily2{
    color: white;
    font-size: x-large;
    font-family: -webkit-pictograph;
    font-weight: bold;
    background-color: black;
    width: 30%;
    
}
</style>
<body>
    <div id="first">
<h5 class="card-title">Update informations of admin</h5>
<form action="{{ url('/updateA') }}" method="post">  
<input name="_method" type="hidden" value="PATCH">
          <div class="box">      
              <label for="first_name">Name:</label><br/>  
              <input id="fname"  type="text" class="form-control" name="name" value={{$admins->name}}><br/><br/>  
          </div>  
          <!-- <div class="box">      
              <label for="first_name">Email</label><br/>
              <input id="fname"  type="text" class="form-control" name="Email" value={{$admins->email}}><br/><br/>  
          </div>   -->
          <div class="box">      
              <label for="first_name">contact number</label><br/>
              <input id="fname"  type="number" class="form-control" name="number" value={{$admins->number}}><br/><br/>  
          </div>  
          <div class="box">      
              <label for="first_name">Address</label><br/>
              <input id="fname"  type="text" class="form-control" name="address" value={{$admins->address}}><br/><br/>  
          </div>  
         
<br/>  
 
<button type="submit" class="btn-btn" >Update</button>  
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>  
</div>
