
<?php
	session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    include 'navbar_login.php';
  } else { 
	include 'navbar_logout.php';
}
?>





.
.






























   


        $fhd = $album_name && $album_type;
        if($fhd != ""){
          $insertquery = "INSERT INTO album (user_id, album_name, image_name, image_new_name, image_type) VALUES ('$id', '$album_name', '$filename', '$new_name', '$album_type')";

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
        } else {
          // (Validations for Required-Fields)
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["album_name"])) {
                $album_nameErr = "Album-Name is Required";
              }

              if(empty($_POST["album_type"]) || $_POST["album_type"] == 0){
                $album_typeErr = "Album-Type is Required";
              }
              ?>
              <!-- Toaster for (Error)-Error -->
              <script type="text/javascript">
                jQuery(document).ready(function($){
                  toastr.info('Field-Required! <br> Register Abort');
                });
              </script>
              <?php
            }
          }
        } else {}
      } else {}
  }
  ?>























           
          
            
          

















