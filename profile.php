<?php
  session_start();
  $row = $_SESSION['user'];
  $name1 = $row['first_name'];
  $name = $row['last_name'];
  if (!isset($_SESSION['user'])) {
    header("Location: dashboard.php");
  }
?>


<!DOCTYPE html>
<html>
<!-- Head -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Title -->
  <title><?php print_r($name1);?> <?php print_r($name);?> | Gallery-App</title>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">

</head>

<!-- Body -->
<body>

<div class="container emp-profile mt-5">
  <form action = "" method="POST">
    <div class="row">
      <div class="col-md-4">
        <div class="profile-img">
          <img src="assets/images/91303A_1_200x160.jpg" alt=""><div class="file btn btn-md btn-success">
            <input type="file" name="file">
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="profile-head text-success">
        <h5><b>Muhammad Fahad</b></h5>
        <div class="text-primary"><h6><b>Web Developer</b></h6></div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"  role="tab" aria-controls="home" aria-selected="true"><b>About</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b>Timeline</b></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="col-md-2">
      <input type="submit" class="profile-edit-btn btn-success" name="btnAddMore" value="Edit-Profile">
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="profile-work mt-4">
        <ul>
          <h6><b>WORK LINK</b></h6>
          <li> <a href="">Bootply Profile</a> </li>

          <div class="mt-4"></div>
          <h6><b>SKILLS</b></h6>
          <div class="text-primary">
            <li> Web Developer </li>
            <li> PHP, JAVA, C++ </li>
            <li> HTML </li>
            <li> Bootstrap-4</li>
          </div>
        </ul>
      </div>
    </div>

    <div class="col-md-8 mt-4">
      <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-md-4"> <label><b>User-Id</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>fahad786</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Name</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>Muhammad Fahad</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Email</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>fahidwazirali@gmail.com</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Phone</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>0092-321-6918739</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4 text-info"> <label><b>Profession</b></label> </div>
            <div class="col-md-8 text-info"> <p><b>Web Developer and Designer</b></p> </div>
          </div>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

          <div class="row">
            <div class="col-md-4"> <label><b>Experience</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>Beginner</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Hourly-Rate</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>2$/hr</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Total-Projects</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>3</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>English-Level</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>intermediate</b></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"> <label><b>Availability</b></label> </div>
            <div class="col-md-8 text-success"> <p><b>6-months</b></p> </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</form>
</div>

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.min.js"></script>

</body>
</html>