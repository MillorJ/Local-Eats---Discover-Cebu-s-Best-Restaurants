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
    header("Location: lantaw.php");
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

    <title>Local Eats | Lantaw Seafood and Grill</title>

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
    <img src="https://sugbo.ph/wp-content/uploads/2021/02/Lantaw-Floating-Native-Restaurant-Cordova-Cebu-8-1024x683.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>Lantaw Seafood and Grill</h2>
        <p>Good food plus a stunning scenery. This is the main reason why people flock to Lantaw Floating Native Restaurant in Cordova, Cebu. Lantaw is a Bisaya word that translates to “look out”. It is a floating restaurant located in Day-as, Cordova where you can enjoy having an intimate dinner with your family while watching the sun set in the horizon with the calming sound of seawater surrounding the restaurant.</p>

        <p>The interior of Lantaw restaurant also boasts of an Asian theme, with bamboos dominating the entire structure. Indeed, Lantaw Floating Restaurant is one of the restaurants in Cebu province with the best views. Aside from the view, Lantaw Floating Native Restaurant is known for their palatable dishes that are sure to make you crave for a second serving.</p>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2021/02/Lantaw-Floating-Native-Restaurant-Cordova-Cebu-13-1-1024x768.jpg" alt="Restaurant Image 1" class="LANTAW-image">
        </div>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2021/02/Lantaw-Floating-Native-Restaurant-Cordova-Cebu-6-1024x1274.jpg" alt="Restaurant Image 2" class="LANTAW-image2">
        </div>

        <div class="restaurant-image-container">
        <img src="https://sugbo.ph/wp-content/uploads/2021/02/Lantaw-Floating-Native-Restaurant-Cordova-Cebu-12-1024x1024.jpg" alt="Restaurant Image 3" class="LANTAW-image3" style="max-height: inherit;">
        </div>

        <p>Their regular customers come back for their best-sellers such as their crispy pata, tuna panga, crispy kare-kare, and buttered shrimp. Their succulent and cheesy baked scallops are also a must-try, and of course, all their fresh seafood dishes are just as good. Now pair all these with a bottle of beer while chatting with family and friends and watching the sun set from a distance. Lantaw Floating Native Restaurant  will really take your gastronomic experience to a different level.Now pair all these with a bottle of beer while chatting with family and friends and watching the sun set from a distance. Lantaw Floating Native Restaurant  will really take your gastronomic experience to a different level.</p>

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