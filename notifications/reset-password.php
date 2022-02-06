<?php

$email = $_REQUEST["email"];
session_start();
if (!empty($email)) {
$query = "SELECT * FROM users WHERE email = '".$email."'";

include '../connection.php';
$result = mysqli_query($con, $query);
$num_rows = $result->num_rows;
$response = "";
if ($num_rows == 1) {
$token = md5(date("Y-m-d H:i:s"));
$sql = "UPDATE users SET token='$token' WHERE email = '$email' ";
$results = mysqli_query($con, $sql);

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
// Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
$mail->isSMTP(); //Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "fahidwazirali@gmail.com";
$mail->Password = "Fahad915";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "fahidwazirali@gmail.com";
$mail->FromName = "Gallery App";

$mail->addAddress($email, "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Reset Password Notification";
$mail->Body = '<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body style="background: #edf2f7; padding-left:200px; padding-right: 200px; padding-top: 100px; padding-bottom: 100px;">
<div style="text-align: center; margin-bottom: 50px;">
<img src = "assest/images/logo.png"></div>
<div style="background-color: white;">
<div style="padding: 50px;">

<div style="margin-left: 20px; margin-right: 20px;">
<h1>Hello!</h1>
<p>You are receiving this email because we received a password reset request for your account.</p>
</div>
<div style="text-align: center; padding-top: 20px; padding-bottom: 20px;">
<a href="http://localhost:/new-password.php?token='.$token.'&email='.$email.'&action=reset" target="_blank" style="border-radius: 5px; padding: 15px; background: #2d3748; color: white; text-decoration: none;">Reset Password</a>
</div>
<div style="margin-left: 20px; margin-right: 20px;">
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>
<p>Regards,</p>
<p>Gallery-app</p>
<hr style="margin-top: 50px; margin-bottom: 50px;">
</div>
<div style="padding-left: 20px; padding-right: 20px;">
<p>If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
</div>
<div style="padding-left: 20px; padding-right: 20px;">
<p><a href="http://localhost:/new-password.php?token='.$token.'&email='.$email.'&action=reset" target="_blank">http://localhost:8080/gallery-app/new-password.php?token='.$token.'&email='.$email.'&action=reset</a></p>
</div>
</div>
</div>
</body>
</html>';
$mail->AltBody = "This is the plain text version of the email content";

try {
$mail->send();
$response = [
'status' => 'success',
'message' => 'A reset passowrd link has been sent to your email, please check inbox.'
];
} catch (Exception $e) {
$response = [
'status' => 'error',
'message' => 'Mailer Error: ' . $mail->ErrorInfo
];
}
} else {
$response = [
'status' => 'error',
'message' => 'Email does not exist, please try again.'
];
}

if(!empty($response)) {
$respJason = json_encode($response);
echo $respJason;
}
}