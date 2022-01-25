<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> 
<link href="css/styles.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="col-md-4">
      <!-- START widget-->
      <div class="panel widget">
         <div class="panel-body bg-danger text-center">
            
            <img src="..\uploads\teacher.jpg"  width="150" height="150" alt="Image" class="img-thumbnail img-circle thumb96">
            <h4 class="mt0">Count of Teachers</h4>
            <p class="number">{{ $data['teacher'] }}</p>
            <div class="clearfix">
              
            </div>
         </div>
      </div>
      <!-- END widget-->
   </div>
    <div class="col-md-4">
      <!-- START widget-->
      <div class="panel widget">
         <div class="panel-body bg-primary text-center">

            <img src="..\uploads\student.jpg" alt="Image" width="150" height="150" class="img-thumbnail img-circle thumb96">
            <h4 class="mt0">Count of Students</h4>
            <p class="number">{{ $data['stud'] }}</p>
            
         </div>
      </div>
      <!-- END widget-->
   </div>
    <div class="col-md-4">
      <!-- START widget-->
      <div class="panel widget">
         <div class="panel-body bg-info text-center">
            
            <img src="..\uploads\books.png" alt="Image" width="150" height="150" class="img-thumbnail img-circle thumb96">
            <h4 class="mt0">Count of Courses</h4>
            <p class="number">{{ $data['courses'] }}</p>
            
         </div>
      </div>
      <!-- END widget-->