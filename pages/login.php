<?php
session_start();
?>
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
  <!--Login CSS-->
  <link href="../css/home.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>LOGIN | LOCAL EATS</title>
  <!---Custom JavaScript-->
  <script src="../js/login-type.js" defer></script>
  <!-- JavaScript to show the overlay message if the query parameter is present -->
</head>

<body>
  <!-- HTML for the overlay message -->
  <div id="overlay">
    <div class="message">
      <p><?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : 'You need to login or create an account!'; ?></p>
      <a id="ok" style="text-decoration: none;" href="login.php">I understand</a>
    </div>
  </div>

  <!--NAVBAR-->
  <?php
  include 'navbar.php';
  ?>

  <div class="container-p">
    <div class="left-bg"></div>
    <div class="right-bg"></div>
    <div class="center">
      <section class="login-section">
        <div class="login-box">
          <form action="../php/login-process.php" method="post">
            <h2>Login | Local Eats</h2>
            <div id="typewriter"></div>
            <br>
            <div class="input-box">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="text" name="email" required>
              <label>Email / Username</label>
            </div>
            <div class="input-box">
              <span id="showPasswordSpan" class="icon"><ion-icon name="lock-closed"></ion-icon></span>
              <input id="password" type="password" name="password" required>
              <label>Password</label>
            </div>
            <button class="login-btn-s" type="submit">Login</button>
            <div class="register-link">
              <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>

  <!--Ionic Framework Icons-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- Makes password visible upon clicking the icon -->
  <script src="../js/login-show-hide.js" type="text/javascript">
  </script>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const showOverlay = urlParams.get('show_overlay');
    if (showOverlay === 'true') {
      const overlay = document.getElementById('overlay');
      overlay.style.display = 'flex';
    }
  </script>

  <?php
  if (isset($_SESSION['login_error'])) {
    echo '
        <script>
          document.getElementById("overlay").style.display = "flex";
        </script>
    ';
    unset($_SESSION['login_error']);
  }
  ?>
</body>

</html>