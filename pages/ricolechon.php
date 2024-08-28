<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

require_once '../php/review_functions.php';

$id = 2;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: ricolechon.php");
    exit();
}


$reviews = getAllReviews($id);
$rows = getNumReviews($id);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Eats</title>
    <!--Bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Bootsrap JS-->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--Restaurant Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Custom FavIcon-->
    <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
    <!--Custom CSS-->
    <link href="../css/home.css" rel="stylesheet" type="text/css" >
    <!--Goolge API Styles-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Restaurant Page</title>
    <style>
        <?php include '../css/ricolechon.css'; ?>
    </style>
</head>
<body>
      <!--NAVBAR-->
      <?php 
      include 'navbar.php';
    ?>
    <img src="https://media.philstar.com/photos/2019/09/08/rico-lechon_2019-09-08_21-02-09.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>Rico's Lechon</h2>
        <p>Rico’s Lechon is known for its best-tasting, crispy Cebu Carcar lechon which comes in two flavors: original and spicy.</p>
        <p>Included in the menu are the Filipino favorites like Special Boneless Bangus, Sizzling Lechon Sisig, Monggos, Bicol Express, Kinilaw Na Tangigue (Ceviche), Calamares, Camaron Rebosado, Garlicky Squid Balls, Sinigang, Pinakbet, Chopsuey, and Pancit Canton.</p>
        <div class="restaurant-image-container">
                <img src="https://sugbo.ph/wp-content/uploads/2019/07/ricoslechon-mandauecebu.jpg" alt="Restaurant Image 1" class="restaurant-image">
            </div>
            <div class="restaurant-image-container">
                <img src="https://sugbo.ph/wp-content/uploads/2019/06/ricoslechon-mandauecebu-18-1024x643.jpg" alt="Restaurant Image 2" class="restaurant-image2">
            </div>
            <div class="restaurant-image-container">
                <img src="https://sugbo.ph/wp-content/uploads/2019/07/ricoslechon-cebu-3.jpg" alt="Restaurant Image 3" class="restaurant-image3">
            </div>
        <p>Prepare to be mesmerized by the tantalizing aroma that fills the air as the perfectly roasted lechon takes center stage. Sink your teeth into tender, juicy meat and savor the crispy, golden-brown skin that Rico's Lechon is renowned for. But that's not all - their menu also boasts a diverse selection of traditional Filipino favorites, from adobo bursting with savory goodness to sinigang brimming with tangy flavors.</p>
        <p><strong>Operating hours:</strong> 8 AM to 10 AM</p>
        <p><strong>Contact numbers:</strong> (032) 344-0119</p>
        <p><strong>Social:</strong> <a href="https://www.facebook.com/RicosLechonOfficial">link</a></p>
        <p><strong>Exact location:</strong> N Escario St, Cebu City, Cebu</p>
        </div>
    
    </div>
    </div>
    <div class="user-comments">
        <h2>User Comments</h2>
        <div class="comment-form">
            <br><br>
            <form method="POST">
           
            <br>
            <label for="user_name">Your Name:</label>
            <input type="text" name="user_name" required>
            <br>
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="5">5 stars</option>
                <option value="4">4 stars</option>
                <option value="3">3 stars</option>
                <option value="2">2 stars</option>
                <option value="1">1 star</option>
            </select>
            <br>
            <label for="comment">Comment:</label>
            <textarea name="comment" required></textarea>
            <br>
            <input type="submit" name="create_review" value="Submit Review">
            <br>
        </form>
      </div>
    </div>
  </div>
  <div class="comments">
        <?php
            for($i = 0; $i < $rows; $i++) {
                echo '<hr><h2>'. $reviews[$i]['user_name'] . '</h2><i><u>(' . $reviews[$i]['rating'] . ' stars)</u></i><p>' . $reviews[$i]['comment'] . '</p>';
                echo '<a href="../php/delete_review.php?id=' . $reviews[$i]['id'] . '">Delete</a> | <a href="../php/update_review.php?id=' . $reviews[$i]['id'] . '">Update</a>';
            }
        ?>
    </div>
</body>
</html>