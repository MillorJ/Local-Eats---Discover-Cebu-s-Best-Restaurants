<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}


?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $subject = test_input($_POST["subject"]);
  $message = test_input($_POST["message"]);

  // Trim leading and trailing spaces
  $subject = trim($subject);
  $message = trim($message);

  // Redirect to the email link
  $mailtoLink = "mailto:usclocaleats@gmail.com?subject=" . rawurlencode($subject) . "&body=" . rawurlencode($message);
  header("Location: $mailtoLink");
  exit;
}

// Function to sanitize user input
function test_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Example</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Material Symbols Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- Custom FavIcon -->
    <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <style>
        <?php include '../css/contact.css'; ?>
    </style>
    <!-- Custom JavaScript -->
    <script src="../js/login-type.js"></script>
</head>
<body>

<body>
   <!--NAVBAR-->
    
   <?php 
      include 'navbar.php';
    ?>
      <div class="container">
        <div class="container">
          <h1>Contact Us</h1>
          <p>Send us a message regarding your concerns or inquiries and our team will try to respond as soon as possible.</p>
          <div class="picture-scroll">
            <img src="https://sugbo.ph/wp-content/uploads/2022/12/1-5-Fine-dining-restaurants-in-cebu.jpg">
            <img src="https://sugbo.ph/wp-content/uploads/2019/08/1unlifindsinsrp.jpg">
            <img src="https://sugbo.ph/wp-content/uploads/2019/07/Barangay-Seoul-Unli-Samgyeopsal-Cebu-City.jpg">
            <img src="https://sugbo.ph/wp-content/uploads/2019/11/1romanticrestaurants.jpg">
            <img src="https://www.nrn.com/sites/nrn.com/files/styles/article_featured_retina/public/foodservice-cashier.jpg?itok=jeLpSEe3">
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <input type="submit" name="submit" value="Send">
          </form>
        </div>
      </div>
</body>
</html>