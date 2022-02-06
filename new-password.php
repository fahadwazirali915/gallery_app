<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Reset your password</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/toastr.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<script src="assets/js/jquery-3.5.1.min.js"></script>
</head>
<body class="login-body">

<?php
$pswd = $conf_pswd = "";
$token = ($_GET['token']);
$email = ($_GET['email']);

$query = "SELECT * FROM users WHERE email = '$email' AND token = '$token'";

include 'connection.php';
$result = mysqli_query($con, $query);
$num_rows = $result->num_rows;
if ($num_rows != 1){
?>
<script type="text/javascript">
$(document).ready(function(){
toastr.error('Email or token is not match');
});
</script>
<?php
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include('function.php');
if (empty($_POST["password"])) {
$pswdErr = "Password is required";
} else {
$pswd = test_input($_POST["password"]);
}
if (empty($_POST["conf_password"])) {
$conf_pswdErr = "Password is required";
} else {
$conf_pswd = test_input($_POST["conf_password"]);
}

if($pswd == $conf_pswd){

$sql = "UPDATE users SET password ='$pswd' WHERE email = '$email' ";
$results = mysqli_query($con, $sql); ?>

<script type="text/javascript">
$(document).ready(function(){
toastr.success('Password updated successfully');
});
</script>
<?php
}

} ?>
<div class="container">
<div class="d-flex justify-content-center align-middle">
<form method="post" action="" class="w-50 d-inline-block border p-3">
<div class="form-group">
<label for="password">New Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" >
<span class="error text-danger"><?php if(!empty($pswdErr)) echo $pswdErr; ?></span>
</div>
<div class="form-group">
<label for="conf_password">Confirm New Password</label>
<input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm Password" >
<span class="error text-danger"><?php if(!empty($conf_pswdErr)) echo $conf_pswdErr; ?></span>
</div>
<div class="form-group d-flex justify-content-between">
<button type="submit" class="btn btn-primary">Reset Password</button>
</div>
<form>
</div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
</body>
</html>
