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
    header("Location: payag.php");
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

    <title>Local Eats | Edsnath's Payag-Payag</title>

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
    <img src="https://sugbo.ph/wp-content/uploads/2019/09/Edsnaths-Grill-and-Restobar-Payag-payag-Cebu-City-1-1024x381.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>Edsnath's Payag-Payag</h2>
        <p>Cebuanos are fond of drinking and having a good time. Grills and restobars can be found at almost any corner in Cebu City, as each boasts different styles in customer service. Some offer live performances from local bands and some offer promos in their drinks.</p>

        <p>Edsnath’s Payag-Payag, Grill and Restobar is the newest tambayan in the Banilad area. What makes it different among the local common drinking spots is their bamboo furniture, providing that homey vibe, making drinking sessions more intimate together with close friends and family.</p>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2019/09/Edsnaths-Grill-and-Restobar-Payag-payag-Cebu-City-4-1024x768.jpg" alt="Restaurant Image 1" class="GIAN-image">
        </div>

        <div class="restaurant-image-container">
            <img src="https://sugbo.ph/wp-content/uploads/2019/09/Edsnaths-Grill-and-Restobar-Payag-payag-Cebu-City-2-1024x768.jpg" alt="Restaurant Image 2" class="GIAN-image2">
        </div>

        <div class="restaurant-image-container">
        <img src="https://scontent.fceb1-2.fna.fbcdn.net/v/t39.30808-6/337382984_151403701181861_6298038515292129568_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGT-M4ide896MHzxzV8wifP2eJKp_nHl5rZ4kqn-ceXmjr_EewW_jHe1n5zLX3LS-1KWOSh3XqeJsC9Q09VNtB7&_nc_ohc=riCtAJAgCIwAX-KXFgM&_nc_ht=scontent.fceb1-2.fna&oh=00_AfBJ8rY8GTlR4kkx547Tzjn-4FQCmXzG8wtLJCkIWq_xqg&oe=646BCD78" alt="Restaurant Image 3" class="PAYAG-image3" style="max-height: inherit;">
        </div>

        <p>The restaurant also compliments its native interiors with various food and drinks. Their liquor includes beer, rum, tequila, gin and many more. When it comes to their food, they also have a wide menu that will surely satisfy your palate. The place also has that lively vibe and ambience, making your get-togethers more memorable. The atmosphere, the music and the people around are more than ready to make your next tagay session here surely for keeps.</p>

        <p><strong>Operating hours:</strong> 9AM to 3AM daily</p>
        <p><strong>Contact Number:</strong> (032) 326-7001</p>
        <p><strong>Social:</strong> <a href="https://www.facebook.com/edsnathspayag/">link</a></p>
        <p><strong>Exact location:</strong> Nasipit, Talamban, Cebu City</p>
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