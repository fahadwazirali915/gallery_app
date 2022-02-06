<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;

//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
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

$mail->Subject = "contact_form";
$mail->Body = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<title>contact form</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
html,body {
	margin: 0 auto !important;
	padding: 0 !important;
	height: 100% !important;
	width: 100% !important;
	background: #fff !important;
	}
	body {
		font-weight: 400;
		font-size: 15px;
		line-height: 1.8;
		color: rgba(0,0,0,.4);
	}
	* {
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
		outline: none !important;
	}
	table {
		border-spacing: 0 !important;
		border-collapse: collapse !important;
		table-layout: fixed !important;
		margin: 0 auto !important;
		width: 100%;
	}
	img {
		-ms-interpolation-mode:bicubic;
	}
	a {
		text-decoration: none;
	}
	a {
		color: #000000;
	}

	*[x-apple-data-detectors],
	.unstyle-auto-detected-links *,
	.aBn {
		border-bottom: 0 !important;
		cursor: default !important;
		color: inherit !important;
		text-decoration: none !important;
		font-size: inherit !important;
		font-family: inherit !important;
		font-weight: inherit !important;
		line-height: inherit !important;
	}
	.a6S {
		display: none !important;
		opacity: 0.01 !important;
	}
	.btn {
		border-radius: 0;
		background: #1a1a1a;
		color: #ffffff;
		padding: 10px 20px;
		display: inline-block;
		font-weight: 500;
	} 
	h1,h2,h3,h4,h5,h6{
		color: #000000;
		margin-top: 0;
		font-weight: 400;
	}
	.hero .text h2{
color: #000;
font-size: 20px;
font-weight: 700;
line-height: 1.4;
letter-spacing: 2px;
margin-bottom: 25px;
}
.hero .text h3{
color: #8c8c8c;
font-size: 14px;
font-weight: 600;
line-height: 1.5;
max-width: 360px;
margin: auto;
margin-bottom: 40px;
}
ul.social li{
display: inline-block;
margin-right: 35px;
}
.footer ul{
margin: 0;
padding: 0;
text-align: center;
margin-bottom: 50px;
}
.footer ul li{
list-style: none;
}
.footer ul li a{
color: rgba(0,0,0,1);
}
@media only screen and (max-width: 561px) {
p {
font-size: 12px;
}
.copyright-footer p {
font-size: 11px !important;
}
}
@media only screen and (max-width: 487px) {
p {
font-size: 11px;
}
.hero .text h3{
font-size: 13px;
}
.copyright-footer p {
font-size: 10px !important;
}
}
@media only screen and (max-width: 436px) {
.hero .text h3{
font-size: 11px;
}
}
@media only screen and (max-width: 419px) {
.btn {
font-size: 10px;
}
.hero .text h2 {
font-size: 16px;
}
.hero .text h3 {
font-size: 10px;
}
p {
font-size: 8px;
}
.copyright-footer p {
font-size: 7px !important;
}
}
@media only screen and (max-width: 360px) {
.hero .text h3 {
font-size: 8px;
}
}
</style>
</head>
<body style="width: 100%; margin: 0; padding: 0 !important; background-color: #fff;overflow-x: hidden;">
<div style="max-width: 600px; width: 100%; margin: 0 auto;" class="email-container">
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto; width: 100%;">
<tr>
<td valign="top" style="padding: 1em 2.5em 0 2.5em;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
<tr>
<td class="logo" style="text-align: center;">
<a href="#">
<img src="https://drive.google.com/uc?export=view&id=1m0L8am-XlYipL2cs2dE5O5gtlEg6DJy-" class="img-fluid">
</a>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td valign="middle" class="hero" style="padding: 2em 0 4em 0;">
<table>
<tr>
<td>
<div class="text" style="padding: 0 2.5em; text-align: center;">
<h2 style="text-align: center;">Contact Form</h2>
<ul class="list-unstyled">
'.$name.'<br>
'.$email.'<br>
'.$phone.'<br>
'.$message.'<br>
</ul>

</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="width: 100%; margin: auto;" class="footer">
<tr>
<td valign="middle">
<ul class="social">
<li>
<a href="https://www.instagram.com/studioarts3d" target="_blank">
<img src="https://drive.google.com/uc?export=view&id=1svrds22-hTmAVMkxFze8P1JaRIuOxMG_">
</a>
</li>
<li style="margin: 0;">
<a href="https://www.facebook.com" target="_blank">
<img src="https://drive.google.com/uc?export=view&id=15nByhYeM4T8-qpgnLCh1FQzQJ1abjPts">
</a>
</li>
</ul>
</td>
</tr>
<tr>
<td class="bg_light copyright-footer" style="text-align: center;">
<p style="font-size: 12px; font-weight: 400; color: #959595; margin: 0;">&copy;2020 Copyright.</p>
</td>
</tr>
</table>
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

if(!empty($response)) {
$respJason = json_encode($response);
echo $respJason;
}

?>