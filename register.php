<!DOCTYPE html>
<html>
<!-- Head -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Gallery-App | Register</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/toastr.min.css">
  <script src="assets/js/jquery-3.5.1.min.js"></script>
</head>

<!-- Body -->
<body>

<!-- PHP -->
  <?php

  include 'connection.php';
  include 'function.php';

  // Validations (Error-Variable Declaration)!
  $first_nameErr = $last_nameErr = $emailErr = $passwordErr = $confirm_passwordErr = $birthdayErr = $genderErr = $checkboxErr = ""; 

  // Validations (Variable Declaration)!
  $first_name = $last_name = $email = $password = $confirm_password = $birthday = $gender = $checkbox = "";

  // (Register-Button)
  if(isset($_POST['submit'])){

  // (Validations for Required-Fields)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["first_name"])) {
        $first_nameErr = "First-Name is Required";
      } 

      if (empty($_POST["last_name"])) {
        $last_nameErr = "Last-Name is Required";
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
      }

      if (empty($_POST["password"])) {
        $passwordErr = "Password is Required";
      } 

      if (empty($_POST["confirm_password"])) {
        $confirm_passwordErr = "Confirm-Password is Required"; 
      }

      if (empty($_POST["birthday"])) {
        $birthdayErr = "Birthday is Required";
      }

      if(empty($_POST["gender"]) || $_POST["gender"] == 0){
        $genderErr = "Gender is Required";
      }

      if (empty($_POST["checkbox"])) {
        $checkboxErr = "Please check all terms & conditions";
      }

    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
  

  // (Variables-[Not Empty] ->)
  // (All-Variable Declaration)!
  $fhd = $first_name && $last_name && $email && $password && $confirm_password && $birthday && $gender;
  if($fhd != "") {

  // Password Encrypt!
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirm_password, PASSWORD_BCRYPT);
    // Password Ristriction!
    // (Variables-[Same type & data-words] ->)
    // (Password Declaration)!
    $pass = ($password === $confirm_password);
    if(($pass >= 8) && ($pass)) {

    // Email Duplication! 
      $emailquery = "select * from users where email = '$email' ";
      $query = mysqli_query($con, $emailquery);
      $emailcount = mysqli_num_rows($query);

      // (New Email [Enter] ->)
      if ($emailcount == 0) {
        $insertquery = "INSERT INTO users(first_name, last_name, email, password, birthday, gender) VALUES ('$first_name', '$last_name', '$email', '$password', '$birthday', '$gender')";

        // (Insert time-(Query) ->> DONE)!
        $res = mysqli_query($con, $insertquery);
        if($res){
          ?>
          <!-- Toaster for (Insert-Data)-Success -->
          <script type="text/javascript">
            jQuery(document).ready(function($){
              toastr.success('Register Successfully');
            });
          </script>
          <?php
        } else {
          ?>
          <!-- Toaster for (Error)-Error -->
          <script type="text/javascript">
            jQuery(document).ready(function($){
              toastr.error('Register Abort');
            });
          </script>
          <?php
        }
      } else {
        $emailErr = "Email Already Exists!";
      }
    } else {
      $confirm_passwordErr = "Password is not Matched!";
    }
  } else {
    ?>
    <!-- Toaster for (Error)-Error -->
    <script type="text/javascript">
      jQuery(document).ready(function($){
        toastr.info('Field-Required!');
      });
    </script>
    <?php
  }
}
?>

<!-- HTML -->
<div class="container">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="pt-3 pb-3">
    <div class="text-success text-center"><h2><b>Register</b></h2></div>
    <p class="text-center">Already have an Account <a href="login.php" class="text-success"><b>Login</b></a></p>

    <!-- First-Name -->
    <div class="w-100 row">
      <div class="form-group col-md-6">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name*" onkeyup="lettersOnly(this)" value=<?php echo $first_name;?>>
        <span class="error text-danger"> <?php echo $first_nameErr;?></span>
      </div>

      <!-- Last-Name -->
      <div class="form-group col-md-6">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name*" onkeyup="lettersOnly(this)" value=<?php echo $last_name;?>>
        <span class="error text-danger"> <?php echo $last_nameErr;?></span>
      </div>
    </div>

    <!-- E-Mail -->
    <div class="form-group w-50">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email*" onkeyup="emailOnly(this)" value=<?php echo $email;?>>
      <span class="error text-danger"> <?php echo $emailErr;?></span>
    </div>

    <!-- Password -->
    <div class="w-100 row">
      <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value=<?php echo $password;?>>
        <span class="error text-danger"> <?php echo $passwordErr;?></span>
      </div>

      <!-- Confirm-Password -->
      <div class="form-group col-md-6">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" value=<?php echo $confirm_password;?>>
        <span class="error text-danger"> <?php echo $confirm_passwordErr;?></span>
      </div>
    </div>

    <!-- Date of Birth -->
    <div class="w-100 row">
      <div class="form-group col-md-6">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" name="birthday" id="birthday" value=<?php echo $birthday;?>>
        <span class="error text-danger"> <?php echo $birthdayErr;?></span>
      </div>

    <!-- Gender -->
    <div class="form-group col-md-6">
      <label for="gender">Gender</label>
      <select id="gender" class="form-control" name="gender" value=<?php echo $gender;?>>
        <option selected>Choose...</option>
        <option name="gender" value="1">Male</option>
        <option name="gender" value="2">Female</option>
        <option name="gender" value="3">Other</option>
      </select>
      <span class="error text-danger"> <?php echo $genderErr;?></span>
    </div>
  </div>

  <!-- CheckBox -->
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox">
        <label class="form-check-label" for="checkbox">Agree all <a href=""><b>terms</b><a> and <a href=""><b>conditions</b></a></label>
        <span class="error text-danger"> <?php echo $checkboxErr;?></span>
      </div>
    </div>

    <!-- Register-Button -->
    <input type="submit" name="submit" value="Register" class="btn btn-success">
  </form>
  </div>


  <!-- J-Query Files -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/toastr.min.js"></script>

  <!-- Input Restrictions -->
  <script type="text/javascript">
  // (For Letters only)
  function lettersOnly(input){
    var regex = /[^a-zA-Z ]/gi;
    input.value = input.value.replace(regex, "");
  }

  // (For E-mail only)
  function emailOnly(input){
    var regex = /[^a-zA-Z0-9@.]/gi;
    input.value = input.value.replace(regex, "");
  }
</script>
</body>
</html>