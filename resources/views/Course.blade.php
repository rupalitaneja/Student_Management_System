<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
</head>
<style>
    .box{
        margin-left: 11%;
    }
    input#fname{
        background-repeat:no-repeat;
        background-position:6px;
        border:1px solid #DADADA;
        margin-top: 3px;
            margin-bottom: 20px;   
        padding-left:10px;
        width:310px;
        height:30px;
        font-size:14px;
        box-shadow:0 0 10px;
        -webkit-box-shadow:0 0 10px;
        border-radius:5px;
        -webkit-border-radius:5px;
        }
    </style>
@if($layout=='index')
<div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                    @include("CourseList")
                </section>
            </div>
        </div>
    </div>
@elseif($layout=='create')
  <div id="first">

    <h5 class="card-title">Enter Course Details</h5>
    <form action="{{ url('/storeC') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input name="_method" type="hidden" value="POST">
   
            <div class="box" ><label>Course's Number</label><br>
            <input id="fname" name="Cid" type="text" class="form-control"  placeholder="Enter id">
    </div>
    <div class="box">
            <label>Course Name</label><br>
            <input id="fname" name="name" type="text" class="form-control"  placeholder="Enter name">
    </div>
                <br>   <div>            
        <input class="btnfamily" type="submit" class="btn btn-info" value="Submit">
        <input class="btnfamily2" type="reset" class="btn btn-warning" value="Reset">
     </div>
     @if ($errors->any())
          <div class="alert alert-danger">
         <script>     alert(" Please Enter Correct Details"); </script>;
                    
             </div>
             @endif
        <!--error ends-->
 @elseif($layout=='show')
<div class="container-fluid mt-4">
  <div class="col">
         <section class="col">
           @include("CourseList")
         </section>
         <section class="col"></section>
         </div>
     </div>
@elseif($layout=='edit')
<div class="container-fluid mt-4">
  <div class="col">
         
         <section class="col-md-5">
<div class="card mb-3">
    <!-- <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="..."> -->
    <div class="card-body">
        <h5 class="card-title">Update informations of student</h5>
        <form action="{{ url('/updateC/'.$course->Cid) }}" method="post">

            <div class="form-group">
                <label>Course Name</label>
                <input value="{{ $course->name }}" name="name" type="text" class="form-control"  placeholder="Enter the Course name">
            </div>
        
            <input type="submit" class="btn btn-info" value="Update">
            <input type="reset" class="btn btn-warning" value="Reset">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        </form>
    </div>
</div>

</section>
         </div>
     </div> 
@endif
<footer></footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>