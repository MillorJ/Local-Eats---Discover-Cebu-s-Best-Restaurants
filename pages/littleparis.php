<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

require_once '../php/review_functions.php';

$id = 1;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: littleparis.php");
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
        <?php include '../css/littleparis.css'; ?>
    </style>
</head>
<body>
      <!--NAVBAR-->
      <?php 
      include 'navbar.php';
    ?>
    <img src="https://sugbo.ph/wp-content/uploads/2018/10/La-Vie-Parisienne-Cebu-City-6.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
        <div id="restaurant-info">
            <h2>La Vie Parisienne - The Little Paris</h2>
            <p>La Vie Parisienne offers not just some of the best French pastry, wines and deli products in the entire country but an authentic French experience - a dining experience that is as traditionally French as in a genuine Parisian bakery and deli shop. It is a place where you can rest and get away from the busy city life.</p>
            <p>In the garden area, La Vie Parisienne sets a cozy and relaxing mood for everyone to relax and enjoy good french wine and food. The lights of our cherry blossom trees and colored chairs create an ambience that is unique, not only in Cebu but in the whole wide world. The beautiful environment goes hand in hand with the wide arrange of imported quality products to indulge in.</p>
                <div class="restaurant-image-container">
                    <img src="https://sugbo.ph/wp-content/uploads/2018/10/La-Vie-Parisienne-Cebu-City-1.jpg" alt="Restaurant Image 1" class="restaurant-image">
                </div>
                <div class="restaurant-image-container">
                    <img src="https://sugbo.ph/wp-content/uploads/2018/10/La-Vie-Parisienne-Cebu-City-4.jpg" alt="Restaurant Image 2" class="restaurant-image2">
                </div>
                <div class="restaurant-image-container">
                    <img src="https://sugbo.ph/wp-content/uploads/2018/10/La-Vie-Parisienne-Cebu-City-8.jpg" alt="Restaurant Image 3" class="restaurant-image3">
                </div>
            <p>Following a successful year, La Vie Parisienne has transcended in beauty. The bakery has grown and is embellished to the delight of its guests. In an elegant and mysterious atmosphere defined by beautiful furnitures and accents, La Vie Parisienne represents France and is the best of Cebu. In a luxurious setting, La Vie Parisienne invites you to try the exquisite menu of the Pink House, Shanpelino Wine and french bread.</p>
            <p><strong>Operating hours:</strong> 9 AM to 3 AM (weekdays), 10 AM to 4 AM (weekends)</p>
            <p><strong>Contact numbers:</strong> (032) 260-4388 / (032) 505-0274</p>
            <p><strong>Social:</strong> <a href="https://www.facebook.com/lavieparisienneincebu/">link</a></p>
            <p><strong>Exact location:</strong> 271 Gorordo Avenue, Lahug, Cebu City.</p>
        </div>
    
    </div>
    <div class="user-comments">
        <h2>User Comments</h2>
        <div class="comment-form">
            <br><br>
            <form method="POST">
               
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
            </form>
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