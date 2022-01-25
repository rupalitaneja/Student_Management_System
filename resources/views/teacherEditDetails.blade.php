
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style5.css') }}" rel="stylesheet" type="text/css" >
    <!-- <link rel="stylesheet" href="{{asset('css/style3.css')}}"> -->
    <style>
        
    .label{
        width:30%;
    }
    .box{
        margin-left: 11%;
    }
    .box2{
        height:30px;
        width: 430px;
        background-repeat:no-repeat;
        background-position:6px;
        border:1px solid #DADADA;
        margin-top: 3px;
            margin-bottom: 20px;   
        padding-left:10px;
        font-size:14px;
        box-shadow:0 0 10px;
        -webkit-box-shadow:0 0 10px;
    }

        </style>
    <body>
<div id="first">
 <form action="{{url('/updateT/'.$teacher->Tid)}}" method="post" >  
  
 <input name="_method" type="hidden" value="PATCH">
 
           <div class="box">      
               <label for="Name">Name</label><br/><br/>  
               <input id="fname"  type="text" class="form-control" name="name" value={{$teacher->name}}><br/><br/>  
           </div>  
           <div class="box">      
               <label for="number">contact number</label><br/><br/>  
               <input id="fname" type="text" class="form-control" name="number" value={{$teacher->number}}><br/><br/>  
           </div>  
           <div class="box">      
               <label for="designation">Designation</label><br/><br/>  
               <input id="fname" type="text" class="form-control" name="designation" value={{$teacher->designation}}><br/><br/>  
           </div>  
           <div class="box">      
               <label for="speciality">Speciality</label><br/><br/>  
               <input id="fname" type="text" class="form-control" name="speciality" value={{$teacher->speciality}}><br/><br/>  
           </div>  
          
 <br/>  
   
 <button type="submit" class="btnfamily" class="btn-btn" onclick="return confirm('Are you sure you want to update this item?');">Update</button>  
 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
 </form>  
   
      </div> 
</body>
</html>