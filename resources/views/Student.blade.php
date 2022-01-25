
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style5.css">
    <!-- <script src="js/index.js"></script> -->

</head>
<style>
    /* html{
        background-color: #041018ba;
    } */
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

@if($layout=='create')
    <div id="first">

    <h5 class="card-title">Enter Student's Information</h5>
    <form action="{{ url('/store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="box">
            <label>Roll Number</label><br><br>
            <input id="fname" name="Sid" type="text" class="form-control"  placeholder="Enter unique Roll Number">
        </div>
        <div class="box">
            <label>Name</label><br><br>
            <input id="fname" name="name" type="text" class="form-control"  placeholder="Enter name">
        </div>
        <div class="box">
            <label>Email</label><br><br>
            <input id="fname" name="email" type="email" class="form-control"  placeholder="Enter email">
        </div>
        <div class="box">
            <label>Phone Number</label><br><br>
            <input id="fname" name="number" type="text" class="form-control"  placeholder="Enter number">
        </div>
        <div class="box">
            <label for="birth">Date of Birth</label><br><br>
            <input type="date" id="fname" name="birth">
            </div>
        <div class="box">
            <label>Class</label><br><br>
            <input id="fname" name="class" type="text" class="form-control"  placeholder="Enter class">
        </div>
        <div class="box">
            <label>Address</label><br><br>
            <input id="fname" name="address" type="text" class="form-control"  placeholder="Enter Address">
        </div>
        <div class="box">
    
        <label for="course_id">Select course</label><br><br>
        <select  class="box2" id="fname" type="text" name="course_id" class="form-control">
            <option id="fname" value="">Select Course</option>
            @foreach ($course as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
       
    </div>
        <div class="box">
            <label>Mentor</label><br><br>
            <input id="fname" name="mentor" type="text" class="form-control"  placeholder="Enter mentor Assigned to student">
        </div>
            <Br><br>
            <input id="btnfamily" type="submit" class="btnfamily" value="Submit">
            <input id="btnfamily2" type="reset" class="btnfamily2" value="Reset">

        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <script>alert(" Please Enter Correct Details"); </script>;        
        </div>
    @endif
    
        <!--error ends-->

@elseif($layout=='show')
<div class="container-fluid mt-4">
  <div class="col">
         <section class="col">
           @include("StudentList")
         </section>
         <section class="col"></section>
    </div>
</div>

@endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>