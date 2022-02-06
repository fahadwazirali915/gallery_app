<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_unset();
    session_destroy();
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Title -->
  <title>Gallery-App | HOME</title>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<!-- Body -->
<body class="vh-100">

  <?php include('header.php'); ?>

  <!-- Slider -->
  <div class="banner-slider">
    <div id="slider-indicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider-indicators" data-slide-to="0" class="active"></li>
        <li data-target="#slider-indicators" data-slide-to="1"></li>
        <li data-target="#slider-indicators" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="assets/images/slider/a.jpg" alt="First slide">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="assets/images/slider/b.jpg" alt="Second slide">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="assets/images/slider/c.jpg" alt="Third slide">
        </div>
      </div>

      <a class="carousel-control-prev" href="#slider-indicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#slider-indicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <!-- About Us-->
  <div class= "container mt-3" id = "about">
    <div class = "row">
      <div class="col-md-12">
      <h3 class="text-center bg-dark py-2 text-white"><b>About</b></h3>
      </div>
      
      <div class="col-md-8">
        <h3>What is Lorem Ipsum?</h3>
        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h5>
      </div>

      <div class="col-md-4">
          <img src="assets/images/91303A_1_200x160.jpg" style="width: 300px; height: 300px;">
      </div>
    </div>
  </div>

  <!-- Gallery -->
  <section class="gallery mt-3" id = "gallery">
    <div class="container">
      <h3 class="text-center bg-dark py-2 text-white"><b>Gallery</b></h3>
      <div class="row pt-1">
        <div class="col-3">
          <img src="assets/images/gallery/a.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/b.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/c.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/d.jpg" class="w-100">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-3">
          <img src="assets/images/gallery/e.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/f.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/g.jpg" class="w-100">
        </div>
        <div class="col-3">
          <img src="assets/images/gallery/h.jpg" class="w-100">
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Us-->
  <div class= "container mt-3" id = "contact">
      <div class="col-md-12">
      <h3 class="text-center bg-dark py-2 text-white"><b>Contact</b></h3>
      </div>

      <div class="vh-100 d-flex align-items-center justify-content-center" >
        <div class="container">

          <form class="w-50 mx-auto p-3 border shadow" method="POST" action="">
            <!-- Name -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">
              <span class="name text-danger d-none">Name is required</span>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
              <span class="email text-danger d-none">E-Mail is required</span>
            </div>

            <!-- Phone-No -->
            <div class="form-group">
              <label for="phoneno">Phone Number</label>
              <input type="tel" name="phone" class="form-control" id="phoneno" placeholder="Phone Number">
              <span class="phoneno text-danger d-none">Phoneno is required</span>
            </div>

            <!-- Message -->
            <div class="form-group">
              <label for="textarea">Message</label>
              <textarea class="form-control" name="message" id="textarea" rows="4" placeholder="Message"></textarea>
              <span class="message text-danger d-none">Message is required</span>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-dark"/>
          </form>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    
    <script type="text/javascript">
      jQuery(document).ready(function($){
        $('#contact').submit(function(e){
          e.preventDefault();
          var $data = $(this).serialize();
          var name = $("#name").val();
          var email = $("#email").val();
          var phoneno = $("#phoneno").val();
          var message = $("#message").val();
          console.log(name);
          console.log(email);
          console.log(phoneno);
          console.log(message);

          if (!name) {$('span.name').removeClass('d-none')}
            if (!email) {$('span.email').removeClass('d-none')}
              if (!phoneno) {$('span.phoneno').removeClass('d-none')}
                if (!message) {$('span.message').removeClass('d-none')}
                  $.ajax({
                    method: 'POST',
                    url: 'contact.php',
                    data: {
                      data: $data,
                      name: name,
                      email: email,
                      phoneno: phoneno,
                      message: message,
                    },
                    beforeSend: function(){
                      $('#contact form .loader').removeClass('d-none');
                    },
                    success: function(data){
                      data = "The email sent your gmail";
                      toastr.success(data);
                      $('#contact form .loader').addClass('d-none');
                    }
                  });
              });
      });
    </script>
  </body>
  </html>