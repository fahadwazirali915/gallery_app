<?php
session_start();
if (isset($_SESSION['row'])) {
header('Location: user/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Gallery-App | Login</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/toastr.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/jquery-3.5.1.min.js"></script>
</head>

<body class="login-body">
<?php
$email = $pswd = $f_pswd = $emailErr = $pswdErr = "";
include('function.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["email"])) {
$emailErr = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
}
}
if (empty($_POST["password"])) {
$pswdErr = "Password is required";
} else {
$pswd = test_input($_POST["password"]);
}
if(!empty($email) && !empty($pswd)){
include('connection.php');

$query = "SELECT * FROM `users` WHERE email='$email'
AND password='$pswd'";;
$result = mysqli_query($con, $query);
$rows = mysqli_num_rows($result);
$row = $result->fetch_assoc();
if($rows == 1){
$_SESSION['row'] = $row;
?>
<script type="text/javascript">
$(document).ready(function(){
toastr.success('Successfully Login!');
});
</script>
<?php

// Redirect to user dashboard page
header("Location: user/index.php");
} else { ?>

<script type="text/javascript">
$(document).ready(function(){
toastr.error('Invalid email or password!');
});
</script>

<?php
}
}
}
?>

<!-- Login Section Start -->
<div class="vh-100 d-flex align-items-center justify-content-center" style="padding-top: 100px;">
<div class=" w-50 mx-auto">
<h2 class="text-center mb-4 text-primary">Login</h2>
<form class="p-3 border shadow" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group">
<label for="email">Email address</label>
<input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
<span class="error text-danger"><?php if(!empty($emailErr)) echo $emailErr; ?></span>
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" class="form-control" id="password" placeholder="Password">
<span class="error text-danger"><?php if(!empty($pswdErr)) echo $pswdErr; ?></span>
</div>
<div class="form-check d-flex justify-content-between">
<div class="form-group">
<input type="checkbox" name="remember-me" class="form-check-input" id="remember-me">
<label class="form-check-label" for="remember-me">Remember me</label>
</div>
<div>
<!-- Button trigger modal -->
<a href="JavaScript:void(0);" type="button" data-toggle="modal" data-target="#reset-password-modal">Reset your password</a>
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<p>New around here? <a href="register.php">Register</a></p>
</form>

<!-- Modal -->
<div class="modal fade" id="reset-password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Reset your password</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="p-3 border shadow" id="reset-form">
<div class="form-group">
<label for="reset-email">Enter your email address</label>
<input type="email" class="form-control" id="reset_email" name="reset_email" autocomplete="off" placeholder="Enter email">
<span class="error text-danger"></span>
</div>
<div class="form-group">
<input type="submit" name="reset_password" value="Reset Password" class="btn btn-primary">
<span class="loader ml-3 d-none">
<img src="assets/images/ajax-loader.gif">
</span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/toastr.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
$('#reset-form').submit(function(e){
e.preventDefault();

$data = $(this).serializeArray();

$reset_email = $data[0]['value'];

if (!$reset_email) {
$('#reset-password-modal form span.error').text('Email is required');
} else {
$('#reset-password-modal form span.error').text('');

$.ajax({
method: 'POST',
url: 'notifications/reset-password.php',
data: {
email: $reset_email,
},
beforeSend: function(){
$('#reset-password-modal form span.loader').removeClass('d-none');
},
success: function(data){
var respData = JSON.parse(data);
var respStatus = respData.status;
var respMessage = respData.message;
if(respStatus == 'error'){
toastr.error(respMessage);
} else {
if(respStatus == 'success') {
toastr.success(respMessage);
}
}
$('#reset-password-modal form span.loader').addClass('d-none');
}
});

}
});
});
</script>

</body>
</html>