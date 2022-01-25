
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styleDetail.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    .container{
        align-content:center;
    }               
    </style>
<body>
    <br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="div-box">
        <div class="User-img">
          <img src="uploads/images.png">
        </div>
        <h3 class="User-name"><?php print_r($user->name); ?></h3>
        <h4 class="designation"><?php print_r($students->Sid); ?></h4>
        <!-- <div class="contact-btn">
          <button type="button" class="btn btn-success">Follow</button>
          <button type="button" class="btn btn-secondary">Message</button>
        </div> -->
        <div class="profile-details">
          <ul>
            <!-- <li><a href="#"><i class="fas fa-home"></i> Overview</a></li> -->
            <li><a href="#"><i class="fas fa-user"></i><?php print_r($user->name); ?></a></li>
            <li><a href="#"><i class="far fa-envelope"></i><?php print_r($user->email); ?></a></li>
            <li><a href="#"><i class="fas fa-phone-alt"></i> <?php print_r($students->number); ?></a></li>
            <li><a href="#"><i class="fa fa-address-card-o"></i> <?php print_r($students->address); ?></a></li>
            <li><a href="#"><i class="fa fa-book></i> <?php print_r($students->course); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
