<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style5.css">

</head>
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
    <h5 class="card-title">Enter Admins's Information</h5>
    <form method="post" action="{{url('/storeA')}}">
          <div class="box">
            <label>Admin ID</label><br>
            <input id="fname" name="adminId" type="text" class="form-control"  placeholder="Enter unique Admin ID">
          </div>
          <div class="box">
            <label>Name</label><br>
            <input id="fname" name="name" type="text" class="form-control"  placeholder="Enter name">
          </div>
          <div class="box">
            <label>Email</label><br>
            <input id="fname" name="Email" type="text" class="form-control"  placeholder="Enter email">
          </div>
          <div class="box">
            <label>Phone Number</label><br>
            <input id="fname" name="number" type="text" class="form-control"  placeholder="Enter number">
          </div>
          <div class="box">
            <label>Address</label><br>
            <input id="fname" name="address" type="text" class="form-control"  placeholder="Enter Address">

        <input class="btnfamily" type="submit" class="btn btn-info" value="Submit">
        <input class="btnfamily2" type="reset" class="btn btn-warning" value="Reset">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</div>
@if ($errors->any())
          <div class="alert alert-danger">
         <script>     alert(" Please Enter Correct Details"); </script>;
                    
             </div>
             @endif
        <!--error ends-->
</body>
</html>