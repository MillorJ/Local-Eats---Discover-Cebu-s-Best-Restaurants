<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

require_once '../php/review_functions.php';

$id = 4;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: cafelaguna.php");
    exit();
}

$reviews = getAllReviews($id);
$rows = getNumReviews($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Page | Local Eats</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <!-- Google Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <style>
        <?php include '../css/cafelaguna.css'; ?>
    </style>
</head>
<body>
      <!-- Navbar -->
    <?php include 'navbar.php'; ?>

<img src="https://proudlyfilipino.com/wp-content/uploads/2016/09/Untitled-design-17.jpg" alt="Restaurant Image" id="restaurant-image">

<div id="container">
    <div id="restaurant-info">
        <h2>Café Laguna</h2>
        <p>Filipino food is at the heart and soul of Café Laguna. With multiple branches spread throughout the Visayas and Mindanao regions, this restaurant has rightfully found itself as a go-to for those seeking out a traditional Filipino meal. Their legacy has spanned an impressive thirty years, continuously serving family favorites such as bulalo, sisig, and sapin-sapin. Though named Café Laguna, they are most popular in Cebu, with multiple branches spread throughout the island, as well as in Dumaguete and General Santos City.</p>
        <p>Café Laguna began as a labor of love for the Urbina Family. Coming from a long line of fine cooks, Lita Urbina decided to share her culinary talents with everyone. With the help and encouragement of her family, she started Café Laguna and served Filipino food with a distinctive taste that is incomparable to this day. Food that not only was good but also brought memories of home-cooked meals shared with friends and family.</p>

        <div class="restaurant-images">
            <img src="https://lagunagroup.ph/wp-content/uploads/2021/10/cafe-laguna.jpg" alt="Restaurant Image 1" class="restaurant-image">
            <img src="https://cdn.tatlerasia.com/tatlerasia/i/2022/02/08155407-cafe-laguna-interiors-resized_cover_1080x720.png" alt="Restaurant Image 2" class="restaurant-image">
            <img src="https://lagunagroup.ph/wp-content/uploads/2020/03/Cafe-Laguna_Interior_Lowres-scaled.jpg" alt="Restaurant Image 3" class="restaurant-image">
        </div>

        <p>Now, Café Laguna is a landmark for wholesome and delicious Filipino cuisine. From humble beginnings, the expertise of Lita Urbina and her staff have touched the lives of so many Cebuanos through the restaurant and catering service. Proving, once and for all, that the best way to anyone’s heart is through delicious cooking.</p>

        <p><strong>Social:</strong> <a href="https://www.facebook.com/CafeLagunaPH/">Facebook</a></p>
        <p><strong>Locations:</strong></p>
        <ul>
            <li><strong>Ayala Center Cebu - The Terraces</strong><br>Operating Hours: 10:00am - 9:00pm<br>Contact Numbers: (032) 231 0922 / 0968 222 4198 / 0917 590 3662</li>
            <li><strong>SM City Cebu - UG/F Northwing</strong><br>Operating Hours: 10:00am - 9:00pm<br>Contact Numbers: (032) 236 4132 / 0922 547 1470</li>
            <li><strong>SM Seaside City Cebu - UG/F City Wing</strong><br>Operating Hours: 10:00am - 9:00pm<br>Contact Numbers: (032) 410 7426 / 0968 635 0801</li>
        </ul>
    </div>
    
    </div>
    </div>
    <div class="user-comments">
            <h2>User Comments</h2>
            <div class="comment-form">
                <form method="POST">
                    <label for="user_name">Your Name:</label>
                    <input type="text" name="user_name" id="user_name" required>
                    <br>
                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating" required>
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                    </select>
                    <br>
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" required></textarea>
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