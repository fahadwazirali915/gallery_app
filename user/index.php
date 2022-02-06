<?php
  session_start();
  $row = $_SESSION['row'];
  $name = $row['last_name'];
  if (!isset($_SESSION['row'])) {
    header("Location:../login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Title -->
  <title>Gallery-App</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/all.min.css">

</head>
<style>
  body {
    background-color: #b3b3ff;
  }
</style>

<!-- Body -->
<body>   
  <!-- Header -->
  <header class="bg-dark py-1">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-1">
        <a class="navbar-brand" href="index.php">
          <i class="fas fa-dove fa-2x text-success"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="../index.php"><h6><b>Home</b></h6> <span class="sr-only">(current)</span></a>
            </li><li class="nav-item">
              <a class="nav-link text-white" href="../contact.php"><h6><b>Contact</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../about.php"><h6><b>About</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../faq.php"><h6><b>FAQ</b></h6></a>
            </li>


            <div class="dropdown">
              <button type="button" class="btn bg-dark text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b><?php print_r($name);?></b>
              </button>
              <div class="dropdown-menu bg-secondary">
                <a class="dropdown-item" href="../profile.php"><b>Profile</b></a>
                <a class="dropdown-item" href="../setting.php"><b>Setting</b></a>
                <a class="dropdown-item" href="../logout.php"><b>Logout</b></a>
              </div>
            </div>

          </ul>
        </div>
      </nav>
    </div>
  </header>


  <!-- Sidebar -->
  <div class="row mr-0">
  <div class="bg-secondary w-25 pr-0 col-3">

    <ul class="list-unstyled components">
      <li class="active">
        <li>
          <a href="index.php">
            <button type="button" name="dashboard" class="dashboard btn btn-secondary"><h5><b>Dashboard</b></h5></button>
          </a>
        </li>
        <li>
          <a href="album/create.php">
            <button type="button" name="create-album" class="create-album btn btn-secondary"><h5><b>Create Album</b></h5></button>
          </a>
        </li>
        <li>
          <a href="album/view.php">
             <button type="button" name="view-album" class="view-album btn btn-secondary"><h5><b>View Album</b></h5></button>
           </a> 
        </li>
      </li>
    </ul>
  </div>


  <div class="col-md-9">
  <div class="gallery">
    <h3 class="text-center bg-secondary py-2 text-white mt-2"><b>Public Images</b></h3>
    <div class="row mt-1">
      <div class="col-3">
        <img src="../assets/images/gallery/h.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/g.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/f.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/e.jpg" class="w-100">
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-3">
        <img src="../assets/images/gallery/c.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/d.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/a.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/b.jpg" class="w-100">
      </div>
    </div>
  </div>


  <div class="gallery">
    <h3 class="text-center bg-secondary py-2 text-white mt-3"><b>Private Images</b></h3>
    <div class="row mt-1">
      <div class="col-3">
        <img src="../assets/images/gallery/a1.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/a2.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/b1.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/b2.jpg" class="w-100">
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-3">
        <img src="../assets/images/gallery/c1.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/c2.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/d1.jpg" class="w-100">
      </div>
      <div class="col-3">
        <img src="../assets/images/gallery/d2.jpg" class="w-100">
      </div>
    </div>
  </div>
</div>
</div>


<!-- Footer -->
<?php include('../footer.php'); ?>



<script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/all.min.js"></script>

</body>
</html>