<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style5.css">
</head>
<style>
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
        <input id="fname" name="Sid" type="text" class="form-control{{ $errors->has('Sid') ? ' is-invalid' : '' }}"  placeholder="Enter unique Roll Number">
        <br>
        @if ($errors->has('Sid'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('Sid') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">
        <label>Name</label><br><br>
        <input id="fname" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  placeholder="Enter name">
        <br>
        @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div> 
    <div class="box">
        <label>Email</label><br><br>
        <input id="fname" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Enter email">
        <br>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">
        <label>Phone Number</label><br><br>
        <input id="fname" name="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"  placeholder="Enter number">
        <br>
        @if ($errors->has('number'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('number') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">
        <label for="birth">Date of Birth</label><br><br>
        <input class ="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" type="date" id="fname" name="birth">
            <br>
            @if ($errors->has('birth'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('birth') }}</strong>
            </span>
            @endif    
    </div>
    <div class="box">
        <label>Class</label><br><br>
        <input id="fname" name="class" type="text" class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}"  placeholder="Enter class">
        <br>
        @if ($errors->has('class'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('class') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">
        <label>Address</label><br><br>
        <input id="fname" name="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  placeholder="Enter Address">
        <br>     @if ($errors->has('address'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">

    <label for="course_id">Select course</label><br><br>
    <select  class="box2" id="fname" type="text" name="course_id" class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}">
        <option id="fname" value="">Select Course</option>
        @foreach ($course as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select><br>
    <br> @if ($errors->has('course_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('course_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="box">
        <label>Mentor</label><br><br>
        <input id="fname" name="mentor" type="text" class="form-control{{ $errors->has('mentor') ? ' is-invalid' : '' }}"  placeholder="Enter mentor Assigned to student">
        <br>
        @if ($errors->has('mentor'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('mentor') }}</strong>
        </span>
        @endif
    </div>
<Br><br>
<input id="btnfamily" type="submit" class="btnfamily" value="Submit">
<input id="btnfamily2" type="reset" class="btnfamily2" value="Reset">
</form>
</div>

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