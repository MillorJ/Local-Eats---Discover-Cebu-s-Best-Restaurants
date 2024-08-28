<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

require_once '../php/review_functions.php';

$id = 3;

// Handle form submission for creating a review
if (isset($_POST['create_review'])) {
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    createReview($id, $userName, $rating, $comment);
    header("Location: giansilogan.php");
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
        <?php include '../css/giansilogan.css'; ?>
    </style>
</head>
<body>
      <!--NAVBAR-->
      <?php 
      include 'navbar.php';
    ?>
    <img src="https://cebu247.com/wp-content/uploads/2022/11/Silogan-ni-Gian-1.jpg" alt="Restaurant Image" id="restaurant-image">

    <div id="container">
    <div id="restaurant-info">
        <h2>Silogan ni Gian</h2>
        <p>Pocket-friendly meal options are constantly sought-after by many Filipinos. Silogan ni Gian is the answer to this need. This eatery is one of the most popular food eateries in Cebu City, serving traditional Filipino dishes at an affordable price. The eatery aims to bring the best of local flavors to its customers, making their meal experience more enjoyable.</p>
        <p>Silogan Ni Gian with its great-tasting food, reasonable prices, and friendly staff make it the perfect meal option for families and friends. It specialized in Silog meals. Silog meals are Filipino breakfasts consisting of garlic fried rice, sunny-side-up eggs, and your choice of meat (longganisa, tocino, tapa, or daing na Bangus).  Not all people can afford a two-course meal in a restaurant for breakfast or lunch, but with Silogan Ni Gian, they can enjoy the same deliciousness and quality at an inexpensive price.</p>
        <div class="restaurant-image-container">
                <img src="https://149364733.v2.pressablecdn.com/wp-content/uploads/2015/02/Silogan-ni-Gian.jpg" alt="Restaurant Image 1" class="restaurant-image">
            </div>
            <div class="restaurant-image-container">
                <img src="https://sugbo.ph/wp-content/uploads/2019/11/Silogan-ni-Gian-Cebu-2-1024x1024.jpg" alt="Restaurant Image 2" class="restaurant-image2">
            </div>
            <div class="restaurant-image-container">
                <img src="https://sugbo.ph/wp-content/uploads/2019/11/Silogan-ni-Gian-Cebu-1024x768.jpg" alt="Restaurant Image 3" class="restaurant-image3">
            </div>
        <p>The owner chose to open their branch near universities or schools to cater to students and other individuals looking for a budget-friendly meal. We are all aware that the prices of foods are very expensive but Silogan Ni Gian remains true to its promise of providing Filipino meals at an affordable price. With their goal to provide great-tasting food at an accessible rate, Silogan Ni Gian has become a go-to spot for students and locals alike.</p>
        <p><strong>Operating hours:</strong> 24 hours a day, seven days a week.</p>
        <p><strong>Social:</strong> <a href="https://www.facebook.com/profile.php?id=487757457906128&paipv=0&eav=AfZLkgaAm3vu_TByJUdIsLGU9M94uNn_E0VVyZ3IdCPWGyEZJr7m8vi7A38AJE7kqJI&_rdr">link</a></p>
        <p><strong>Locations:</strong></p>
        <p><strong>Silogan Ni Gian – Banilad</strong></p>
        <p>Address: 8WW7+W6F, Banilad Gov. M. Cuenco Avenue, Cebu City, Cebu</p>
        <p><strong>Silogan Ni Gian – Urgello</strong></p>
        <p>Address: 53 J. Urgello St, Cebu City, 6000 Cebu</p>
        <p>Contact number: 0977 032 5820</p>
        <p><strong>Silogan Ni Gian – Gorordo</strong></p>
        <p>Address: 2 Gorordo Ave, Cebu City, 6000 Cebu</p>
        <p>Contact number: 0922 219 7083</p>
        <p><strong>Silogan Ni Gian – Kasambagan</strong></p>
        <p>Address: 8WQ7+R3M, J Panes St., Kasambagan/Banilad, Cebu City, 6000 Cebu</p>
        <p>Contact number: (032) 511 6738</p>
        <p><strong>Silogan Ni Gian – Mabolo</strong></p>
        <p>Address: 8W95+H7G, Cardinal Rosales Ave, Cebu City, 6000 Cebu</p>
        <p><strong>Silogan Ni Gian – San Antonio, Cebu</strong></p>
        <p>Address: 8V2X+CGV, Junquera St, Cebu City, Cebu</p>
        <p><strong>Silogan Ni Gian – Capitol</strong></p>
        <p>Address: 8V8R+3WP, Cebu City, Cebu</p>
        <p><strong>Silogan Ni Gian – Talamban</strong></p>
        <p>Address: Silogan Ni Gian, 9W27+MH3, Florencio Drive, Cebu City, Cebu</p>
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