<?php
session_start();
if (isset($_SESSION['register_error'])) {
  echo '<div id="overlay" class="overlay">
            <div class="overlay-content">
              <div class="alert alert-danger">' . $_SESSION['register_error'] . '</div>
              <button id="overlayCloseBtn" class="close-btn">&times;</button>
            </div>
          </div>';
  unset($_SESSION['register_error']);

  // Embed the JavaScript code
  echo '<script>
            // Get the overlay element
            const overlay = document.getElementById("overlay");

            // Get the close button element
            const overlayCloseBtn = document.getElementById("overlayCloseBtn");

            // Add click event listener to close button
            overlayCloseBtn.addEventListener("click", function() {
              // Hide the overlay
              overlay.style.display = "none";
            });

            // Hide the overlay after 3 seconds
            setTimeout(function() {
              overlay.style.display = "none";
              // Refresh the page
              location.reload();
            }, 3000);
          </script>';
}

if (isset($_SESSION['register_success'])) {
  echo '<div id="overlay" class="overlay">
            <div class="overlay-content">
              <div class="alert alert-success">' . $_SESSION['register_success'] . '</div>
              <button id="overlayCloseBtn" class="close-btn">&times;</button>
            </div>
          </div>';
  unset($_SESSION['register_success']);

  // Embed the JavaScript code
  echo '<script>
            // Get the overlay element
            const overlay = document.getElementById("overlay");

            // Get the close button element
            const overlayCloseBtn = document.getElementById("overlayCloseBtn");

            // Add click event listener to close button
            overlayCloseBtn.addEventListener("click", function() {
              // Hide the overlay
              overlay.style.display = "none";
            });

            // Hide the overlay after 3 seconds
            setTimeout(function() {
              overlay.style.display = "none";
              // Refresh the page
              location.reload();
            }, 3000);
          </script>';
}
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
  <script src="../js/bootstrap.min.js"></script>

  <!--Custom FavIcon-->
  <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
  <!--Login CSS / REGISTER-->
  <link href="../css/home.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">

  <title>REGISTER | LOCAL EATS</title>
  <style>
    <?php include '../css/register.css'; ?>
  </style>
  <!---Custom JavaScript-->
  <script src="../js/login-type.js"></script>
</head>

<body>
  <!--NAVBAR-->
  <?php
  include 'navbar.php';
  ?>

  <div class="container-p">
    <div class="left-bg"></div>
    <div class="right-bg"></div>
    <div class="center">
      <section class="login-section">
        <div class="login-box" style="height: auto; padding: 20px 0px;">
          <form action="../php/register-process.php" method="post">
            <h2>Register | Local Eats</h2>
            <div id="typewriter"></div>
            <br>
            <div class="input-box">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" name="email" required>
              <label>Email</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
              <input type="text" name="username" required>
              <label>Username</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
              <input type="text" name="first_name" required>
              <label>First Name</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
              <input type="text" name="last_name" required>
              <label>Last Name</label>
            </div>
            <div class="input-box">
              <span id="showPasswordSpan" class="icon"><ion-icon name="lock-closed"></ion-icon></span>
              <input id="password" type="password" name="password" required>
              <label>Password</label>
            </div>
            <div class="remember-forgot">

              <label><input type="checkbox" id="agree-checkbox" required> Agree to the <a href="" data-bs-toggle="modal" data-bs-target="#licenseModal">terms of license and agreement</a></label>

            </div>
            <button class="login-btn-s" type="submit">Register</button>
          </form>
        </div>
      </section>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="licenseModal" tabindex="-1" aria-labelledby="licenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="licenseModalLabel">License and Agreement for Local Eats Website</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>This License and Agreement ("Agreement") is entered into by and between you ("Licensee") and Local Eats, Inc. ("Licensor"). By accessing or using the Local Eats Website (the "Website"), you agree to be bound by the terms and conditions of this Agreement.</p>
          <p>1. Grant of License</p>
          <p>Licensor grants to Licensee a limited, non-exclusive, non-transferable license to access and use the Website solely for the purpose of finding and discovering local restaurants and food establishments. Licensee acknowledges that the Website and all content therein is the property of Licensor and may not be reproduced, distributed, or used for any other purpose without the prior written consent of Licensor.</p>
          <p>2. Use of Website</p>
          <p>Licensee agrees to use the Website in a manner that is consistent with this Agreement and all applicable laws and regulations. Licensee will not use the Website to:</p>
          <ul>
            <li>violate any laws or regulations;</li>
            <li>infringe the rights of any third party;</li>
            <li>post or transmit any content that is unlawful, defamatory, obscene, or otherwise objectionable;</li>
            <li>engage in any activity that disrupts or interferes with the operation of the Website;</li>
            <li>distribute viruses or other harmful computer code.</li>
          </ul>
          <p>3. Intellectual Property</p>
          <p>Licensee acknowledges that the Website and all content therein is the property of Licensor and is protected by intellectual property laws. Licensee will not reproduce, distribute, or use any content from the Website without the prior written consent of Licensor.</p>
          <p>4. Disclaimer of Warranties</p>
          <p>Licensor makes no warranties, express or implied, regarding the Website or its content. The Website is provided "as is" and Licensor disclaims any and all warranties, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement. Licensor does not guarantee the accuracy, completeness, or timeliness of the content on the Website.</p>
          <p>5. Limitation of Liability</p>
          <p>Licensor shall not be liable for any damages arising out of or in connection with the use or inability to use the Website, including but not limited to direct, indirect, incidental, special, or consequential damages. Licensee assumes all risk associated with the use of the Website.</p>
          <p>6. Indemnification</p>
          <p>Licensee agrees to indemnify and hold Licensor harmless from and against any and all claims, damages, liabilities, costs, and expenses, including reasonable attorneys' fees, arising out of or in connection with the use of the Website.</p>
          <p>7. Termination</p>
          <p>Licensor may terminate this Agreement at any time without notice to Licensee. Upon termination, Licensee will immediately cease all use of the Website.</p>
          <p>8. Governing Law </p>
          <p>This Agreement shall be governed by and construed in accordance with the laws of the jurisdiction in which Licensor is located, without giving effect to any choice of law or conflict of law provisions.</p>
          <p>9. Entire Agreement</p>
          <p>This Agreement constitutes the entire agreement between Licensor and Licensee and supersedes all prior understandings or agreements, whether written or oral.</p>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="disagree-button">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="agree-button">Agree</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Script for modal-->
  <script>
    const agreeButton = document.querySelector('#agree-button');
    const agreeCheckbox = document.querySelector('#agree-checkbox');
    const disagreeButton = document.querySelector('#disagree-button');
    if (agreeButton && agreeCheckbox) { // Check if both elements exist
      agreeButton.addEventListener('click', function() {
        agreeCheckbox.checked = true;
      });
    }
    if (disagreeButton && agreeCheckbox) { // Check if both elements exist
      disagreeButton.addEventListener('click', function() {
        agreeCheckbox.checked = false;
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="../js/login-show-hide.js" type="text/javascript"></script>
  <!--Ionic Framework Icons-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>