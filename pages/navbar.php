<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap CSS-->
     <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
     <!--Bootsrap JS-->
     <script src="../js/bootstrap.bundle.min.js"></script> 
    <!--Custom FavIcon-->
     <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
     <!--CSS-->
     <link href="../css/home.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <!--NAVBAR     <a class="nav-link" href="login.php" id="Log">Login</a>-->
    
    <nav class="navbar" id="Home" style="background-color: antiquewhite;">
    
        <div class="container-fluid" style="white-space: nowrap">
          <a class="navbar-brand" href="#">
            <img src="../images/logo.png" alt="Logo" width="200px;" class="d-inline-block align-text-top">
          </a>
          <!--Visible only when less than 500px-->
          <button id="Mobile-Navbar"class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Local Eats<br> Navigational Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="About-Us.php">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactus.php">Contact-Us</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="<?php echo isset($_SESSION['logged_in']) ? 'logout.php' : 'login.php'; ?>" id="Log">
                  <?php echo isset($_SESSION['logged_in']) ? 'Logout' : 'Login'; ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
            
               
              </ul>
            </div>
          </div>
          <!--End of Collapsable Navbar-->
          <ul class="navbar-links ">
            <li><a href="index.php">Home</a></li>
            <li><a href="About-Us.php">About Us</a></li>
            <li><a href="contactus.php">Contact-us</a></li>

            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
              <li><a href="session_end.php">Log-out</a></li>
            <?php } else { ?>
              <li><a href="login.php">Log-in</a></li>
              <li><a href="register.php">Register</a></li>
            <?php } ?>

            
          </ul>
        </div>  
      </nav>
   
    
   
</body>
</html>