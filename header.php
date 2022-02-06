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
                <a class="nav-link text-white" href="user/index.php"><h6><b>Home</b></h6> <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="#about"><h6><b>About</b></h6></a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="#gallery"><h6><b>Gallery</b></h6></a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="#contact"><h6><b>Contact</b></h6></a>
              </li>

              <li>
                <?php if($_SESSION){
                  ?>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle text-white bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </button>

                      <div class="dropdown-menu bg-secondary">
                        <a class="dropdown-item" href="profile.php"><b>Profile</b></a>
                        <a class="dropdown-item" href="setting.php"><b>Setting</b></a>
                        <a class="dropdown-item" href="logout.php"><b>Logout</b></a></div>
                      </div>
                    </form>
                    <?php
                  } else {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="login.php"><h6><b>Login</b></h6></a>
                    </li>
                    <?php
                  }
                  ?>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </header>