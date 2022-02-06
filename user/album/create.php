<?php
  session_start();
  $row = $_SESSION['row'];
  $name = $row['last_name'];
  if (!isset($_SESSION['row'])) {
    header("Location:../login.php");
  }
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Gallery-App | Create-Album</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/toastr.min.css">
  <script src="../../assets/js/jquery-3.5.1.min.js"></script>
</head>
<style>
  body {
    background-color: #b3b3ff;
  }
</style>

<body>
  <?php
  include('../../connection.php');
  include('../../function.php');

  $album_name = $album_type = "";
  $album_nameErr = $album_typeErr = "";

  if(isset($_POST['submit'])) {

    // (Validations for Required-Fields)
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["album_name"])) {
      $album_nameErr = "Album-Name is Required";
    } 
    if($_POST["album_type"] == 0){
      $album_typeErr = "Album-Type is Required";
    } 
  }

    $album_name = $_POST['album_name'];
    $album_type = $_POST['album_type'];

    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $filesize = $_FILES['image']['size'];
    $filetype = $_FILES['image']['type'];
  
    $row = $_SESSION['row'];
    $id = $row['id'];

    $fhd = $album_name && $album_type;
     if($fhd != ""){

        $folder = '../../uploades/';
        $new_name = rand().$filename;

        move_uploaded_file($filetmpname, $folder.$new_name);


          $insertquery = "INSERT INTO albums (user_id, album_name, image_name, image_new_name, image_type) VALUES ('$id', '$album_name', '$filename', '$new_name', '$album_type')";

          // (Insert time-(Query) ->> DONE)!
          $res = mysqli_query($con, $insertquery);
          if($res){
            ?>
            <!-- Toaster for (Insert-Data)-Success -->
            <script type="text/javascript">
              jQuery(document).ready(function($){
                toastr.success('Image Uploaded!');
              });
            </script>
            <?php
          } else {
            ?>
            <!-- Toaster for (Insert-Data)-Success -->
            <script type="text/javascript">
              jQuery(document).ready(function($){
                toastr.error('Image not Upload!');
              });
            </script>
            <?php
          }
       
  }
}
?>
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
              <a class="nav-link text-white" href="../../index.php"><h6><b>Home</b></h6> <span class="sr-only">(current)</span></a>
            </li><li class="nav-item">
              <a class="nav-link text-white" href="../contact.php"><h6><b>Contact</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../about.php"><h6><b>About</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../faq.php"><h6><b>FAQ</b></h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../profile.php"><h6><b><?php print_r($name);?></b></h6></a>
            </li>


            <div class="dropdown">
              <button class="btn dropdown-toggle text-white bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
  <div class="row">
    <div class="bg-secondary col-md-3">

      <ul class="list-unstyled components">
        <li class="active">
          <li>
            <a href="../index.php">
              <button type="button" name="dashboard" class="dashboard btn btn-secondary"><h5><b>Dashboard</b></h5></button>
            </a>
          </li>
          <li>
            <a href="view.php">
               <button type="button" name="view-album" class="view-album btn btn-secondary"><h5><b>View Album</b></h5></button>
             </a> 
          </li>
        </li>
      </ul>
    </div>

    <div class="d-flex mx-auto align-items-center col-md-9 py-5">
      <form class="mx-auto p-4 border shadow" action="" method="POST" enctype="multipart/form-data">
        <h2 class="text-center text-danger"><b>Create Album</b></h2>
        <div class="form-group">
        <label for="album_name"><b>Album Name</b></label>
        <input type="name" class="form-control" name="album_name" id="album_name" aria-describedby="emailHelp" placeholder="Album Name">
        <span class="error text-danger"> <?php echo $album_nameErr;?></span>
      </div>
        <div class="form-group ">
          <label for="album_type"><b>Access Type</b></label>
          <select id="album_type" class="form-control" name="album_type">
            <option selected>Photo-type...</option>   
            <option name="album_type" value="1">Public</option>
            <option name="album_type" value="2">Private</option>
          </select>
          <span class="error text-danger"> <?php echo $album_typeErr;?></span>
        </div>

        <input type="file" name="image">
      
        <button type="submit" name="submit" class="btn btn-danger"><b>Submit</b></button>
      </form>
    </div>
  </div>

<?php include('../../footer.php') ?>

  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/toastr.min.js"></script>
</body>
</html>