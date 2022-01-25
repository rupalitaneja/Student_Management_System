<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Student Management System</title>
<style>
    .btn {
  border: none;
  background-color: #101c28;
color: white;
padding: 12px 16px;
font-size: 30px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
 html, body {
                /* background-color: #fff; */
     background-image: url("{{asset('uploads/erp.jpg') }}") ;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        display: block;
        positon: relative;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 50px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .buttonnn{
                background-color: black;
            }
            .a{
                font-size: 20px;
                    font-size: xx-large;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

     </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <div>
                        <a href="{{ url('/newhome') }}" >
                            <button class="btn"><i class="fa fa-home"></i></button>
                            <!-- <p>{{ Auth::user()->name }} </p> -->
                        </div>
                        <!-- <a href="{{ url('/newhome') }}">Home</a> -->
                    @else
                        <a href="{{ url('/login') }}"><b style="font-size: xx-large;">Login</b></a>
                        <!-- <a href="{{ url('/register') }}">Register</a> -->
                    @endif
                </div>
            @endif
        </div>
    </body>
</html>
