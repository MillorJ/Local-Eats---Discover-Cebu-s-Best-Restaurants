<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

require_once '../php/review_functions.php';

$id = 5;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: houseoflechon.php");
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
        <?php include '../css/houseoflechon.css'; ?>
    </style>
</head>
<body>
      <!--NAVBAR-->
      <?php 
      include 'navbar.php';
    ?>
    <img src="https://i0.wp.com/themhayonnaise.com/wp-content/uploads/2020/05/img_0728.jpg?fit=2048%2C1366&ssl=1" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>House of Lechon</h2>
        <p>House of Lechon is one of the places known for having the best-tasting lechon in Cebu. The restaurant is famous for mixing an elegant dining experience with the most delicious and satisfying meal anybody (Filipinos or foreigners) could ask for. The interior is classy without losing that touch of native Filipino.</p>
        <p>They also have this distinct and famous “lechon sauce” which is not like the usual dips since this salivating juice comes from the lechon itself. It is the droppings of the meat while being roasted. They have it separated so you can have the choice to dip it or just full out pour the sauce to your lechon meal.</p>
        <div class="restaurant-image-container">
                <img src="https://2.bp.blogspot.com/-VXsj5rMVSgQ/WGkd7KpaPiI/AAAAAAAAWqY/fmz563NgNAsFhYVsTrIbGAlhU9w5KzDKwCLcB/s1600/House-of-Lechon-Cebu-14.jpg" alt="Restaurant Image 1" class="restaurant-image">
            </div>
            <div class="restaurant-image-container">
                <img src="https://i0.wp.com/whattoeatph.com/wp-content/uploads/2019/08/DSC09265-1.jpg?fit=5997%2C3998&ssl=1" alt="Restaurant Image 2" class="restaurant-image2">
            </div>
            <div class="restaurant-image-container">
                <img src="https://www.pages.com.ph/houseoflechon/assets/images/houseoflechoninside-1400x933.jpg" alt="Restaurant Image 3" class="restaurant-image3">
            </div>
        <p>With Filipinos on the hunt for the best lechon in the city, House of Lechon tries to perfect its menu but it does not only stop there. The food served is being keenly chosen with a wide selection to satisfy the palate of its target market, both Filipinos & Foreigners. Food varies from Appetizers to its specialty dish, the famous Carcar Lechon with its regular & spicy flavor.</p>
        <p><strong>Operating hours:</strong> 7AM to 11PM daily</p>
        <p><strong>Contact numbers:</strong> (032) 231 0958</p>
        <p><strong>Social:</strong> <a href="https://www.facebook.com/HouseOfLechonCebu">link</a></p>
        <p><strong>Exact location:</strong> Don Jose Avila St., Cebu City</p>
        </div>
    
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