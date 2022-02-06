<?php
  session_start();
  $row = $_SESSION['row'];
  $name = $row['last_name'];
  $userId = $row['id'];
  if (!isset($_SESSION['row'])) {
    header("Location:../login.php");
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
  <title>Gallery-App | View-Album</title>

  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/all.min.css">

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
        <a class="navbar-brand" href="../index.php">
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
              <a class="nav-link text-white" href="../../contact.php"><h6><b>Contact</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../../about.php"><h6><b>About</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../../faq.php"><h6><b>FAQ</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../../profile.php"><h6><b><?php print_r($name);?></b></h6></a>
            </li>


            <div class="dropdown">
              <button class="btn dropdown-toggle text-white bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </button>
              <div class="dropdown-menu bg-secondary">
                <a class="dropdown-item" href="../../profile.php"><b>Profile</b></a>
                <a class="dropdown-item" href="../../setting.php"><b>Setting</b></a>
                <a class="dropdown-item" href="../../logout.php"><b>Logout</b></a>
              </div>
            </div>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- Sidebar -->
  <div class="row mr-0">
    <div class="bg-secondary w-25 col-md-3">

      <ul class="list-unstyled components">
        <li class="active">
          <li>
            <a href="../index.php">
              <button type="button" name="dashboard" class="dashboard btn btn-secondary"><h5><b>Dashboard</b></h5></button>
            </a>
          </li>
          <li>
            <a href="create.php">
              <button type="button" name="create-album" class="create-album btn btn-secondary"><h5><b>Create Album</b></h5></button>
            </a>
          </li>
        </li>
      </ul>
    </div>
    <div class="col-md-9">
      <h1 class="text-center my-5">GALLERY ALBUM</h1>
      <?php
      $row = $_SESSION['row'];
      $userId = $row['id'];
      $selectAlbumQuery = "SELECT * FROM albums WHERE user_id = '$userId'";
      include '../../connection.php';
      $selectAlbumQueryResponse = mysqli_query($con, $selectAlbumQuery);
      $albumArray = mysqli_fetch_assoc($selectAlbumQueryResponse);
      if($selectAlbumQueryResponse->num_rows > 0){
        $_SESSION['albums'] = $albumArray;
        ?>
        <div class="container">
          <div class="row">
            <?php while($row = mysqli_fetch_assoc($selectAlbumQueryResponse)) {
              $id = $row['id'];
              $new_name = $row['image_new_name']; ?>
              <div class="col-md-6">
                <a href="../../user/albums/view.php"><img src="../../uploades/<?php echo $new_name; ?>" style="width:100%" class="hover-shadow cursor"></a>
                <button type="button" name="delete" data-id="<?php echo $id; ?>" data-name="<?php echo $image_new_name; ?>" class="remove-button" class="btn btn-danger">x</button>
                </div>
                <?php
              }
              ?>
          </div>
        </div>
            <?php
          }
        ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include('../../footer.php'); ?>

  <script src="../../assets/js/jquery-3.2.1.slim.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/all.min.js"></script>

</body>
</html>