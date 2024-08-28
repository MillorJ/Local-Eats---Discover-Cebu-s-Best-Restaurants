<?php
session_start();
require_once '../php/review_functions.php';
include 'navbar.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

$id = 3;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: top.php");
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

    <title>Local Eats | Top of Cebu</title>

    <!--Bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Bootstrap JS-->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!--Restaurant Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Custom FavIcon-->
    <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">

    <!--Custom CSS-->
    <link href="../css/home.css" rel="stylesheet" type="text/css" >
    <link href="../css/restaurant.css" rel="stylesheet" type="text/css" >

    <!--Google API Styles-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <img src="https://sugbo.ph/wp-content/uploads/2018/11/Top-of-Cebu-Restaurant-2.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>Top of Cebu</h2>
        <p>Who would ask for a more unforgettable dining experience than the one on top of the mountain with a panoramic view, romantic breezy ambiance and finger-licking good food? We want it. Top of Cebu, a Filipino restaurant owned by the Pages Group Holdings (who also owns Lantaw, House of Lechon, among others), has been serving its customers for over a year now with tasty Filipino dishes with a modern twist while giving them an amazing panoramic view overlooking the city’s skyline.</p>

        <p>As you can imagine, it offers a breathtaking view—you get to see Cebu (as well as Mandaue and Lapu-Lapu) in its full glory! During the day, you get a scenic view of the mountains, while at night, you get to see the city lights and the stars shine against the evening sky. Definitely bring out your phone cameras and snap photos for the 'gram—or just enjoy the moment! It's the perfect backdrop to a romantic date with your special someone, or a reunion with your closest friends or family.</p>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2018/11/topofceburestaurant-1.jpg" alt="Restaurant Image 1" class="TOP-image">
        </div>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2018/11/Top-of-Cebu-Restaurant-1.jpg" alt="Restaurant Image 2" class="TOP-image2">
        </div>

        <div class="restaurant-image-container">
        <img src="https://sugbo.ph/wp-content/uploads/2018/11/topofceburestaurant-3.jpg" alt="Restaurant Image 3" class="TOP-image3" style="max-height: inherit;">
        </div>

        <p>It's one thing to be enjoying great food, and it's another thing to be enjoying great food with the panoramic view of Cebu and the cool breeze. It's a delightful-sounding prospect, if you ask us! No need to dream, as this establishment lets you experience exactly that: Say hello to Top of Cebu, a restaurant that will make you feel like you're dining on top of the world! course, all their fresh seafood dishes are just as good. Now pair all these with a bottle of beer while chatting with family and friends and watching the sun set from a distance. Lantaw Floating Native Restaurant  will really take your gastronomic experience to a different level.Now pair all these with a bottle of beer while chatting with family and friends and watching the sun set from a distance. Lantaw Floating Native Restaurant  will really take your gastronomic experience to a different level.</p>

        <p><strong>Operating hours:</strong> 11AM to 9PM daily</p>
        <p><strong>Contact Numbers:</strong> (032) 514-2959 / 0945-361-5091</p>
        <p><strong>Social:</strong> <a href="https://www.facebook.com/LantawSeafoodandGrill/">link</a></p>
        <p><strong>Exact location:</strong> Sa Baybayon, Cordova, Cebu</p>
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
                echo 
                '<hr><h2>'. $reviews[$i]['user_name'] . '</h2>
                <i><u>(' . $reviews[$i]['rating'] . ' stars)</u></i>
                <p>' . $reviews[$i]['comment'] . '</p>';
                
                echo 
                '<a href="../php/delete_review.php?id=' . $reviews[$i]['id'] . '">Delete</a> | 
                <a href="../php/update_review.php?id=' . $reviews[$i]['id'] . '">Update</a>';
            }
        ?>
    </div>
</body>
</html>