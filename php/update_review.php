<?php
    require_once 'review_functions.php';
    if (isset($_GET['id'])) {
        $reviewId = $_GET['id'];
    }
    if (isset($_POST['rating_update'])) {
        $newName = $_POST['new_name'];
        $newRating = $_POST['rating_update'];
        $newComment = $_POST['comment_update'];
    
        updateReview($reviewId, $newName, $newRating, $newComment);
        header("Location: ../pages/index.php");
        exit();
    }
?>

<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?show_overlay=true');
    exit;
}

$review = getReview($reviewId);

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
        .login-btn:hover{
        background-image: url('../images/naruto-background.gif');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        /* text-outline supports all browsers (text-stroke is a no go)*/
        text-shadow:
        -1px -1px 0 black,
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
        }
        .register-btn:hover{
        background-image: url('../images/naruto-background.gif');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        /* text-outline supports all browsers (text-stroke is a no go)*/
        text-shadow:
        -1px -1px 0 black,
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
        }
        @media (min-width: 728px){
        #Mobile-Navbar{
            display:none;
        }
        }
        @media (max-width: 500px){
        #SearchBox,#search{
            display:none;
        }
        #Mobile-Navbar{
            display:block;
            float:right;
        }
        } .login-btn:hover{
        background-image: url('../images/naruto-background.gif');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        /* text-outline supports all browsers (text-stroke is a no go)*/
        text-shadow:
        -1px -1px 0 black,
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
        }
        .register-btn:hover{
        background-image: url('../images/naruto-background.gif');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        /* text-outline supports all browsers (text-stroke is a no go)*/
        text-shadow:
        -1px -1px 0 black,
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
        }
        @media (min-width: 728px){
        #Mobile-Navbar{
            display:none;
        }
        }
        @media (max-width: 500px){
        #SearchBox,#search{
            display:none;
        }
        #Mobile-Navbar{
            display:block;
            float:right;
        }
        }
      #restaurant-image {
            width: 100%;
            height: auto;
            max-height: 50vh;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        #restaurant-info {
            text-align: justify;
            margin: 50px;
            max-width: 1000px; /* Adjust the width as per your preference */
        }
        #container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        #restaurant-info p {
            margin: 10px 0;
        }
        .restaurant-image-container {
            margin-top: 20px;
            text-align: center;
        }
        .restaurant-image {
            max-width: 100%;
            object-fit: cover;
            max-height: 900px; /* Adjust the height as per your preference */ /* FOR KYLE AND PATRICIA - kaning mga max-height kay make sure the pictures are aligned together like sa akoa */
        }
        .restaurant-image2 {
            max-width: 100%;
            object-fit: cover;
            max-height: 523px; /* Adjust the height as per your preference */ /* FOR KYLE AND PATRICIA - kaning mga max-height kay make sure the pictures are aligned together like sa akoa */
        }
        .restaurant-image3 {
            max-width: 100%;
            object-fit: cover;
            max-height: 537px; /* Adjust the height as per your preference */ /* FOR KYLE AND PATRICIA - kaning mga max-height kay make sure the pictures are aligned together like sa akoa */
        }
        .comment-form {
            text-align: center;
            width: 100%;
            max-width: 1000px; /* Adjust the width as per your preference */
            margin: 0 auto;
        }
        .comment-form input[type="text"], .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .comment-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        #rating-bar {
            text-align: center;
            margin-top: 20px;
            max-width: 600px; /* Adjust the width as per your preference */
            margin-left: auto;
            margin-right: auto;
        }
        .user-comments {
            margin-top: 50px;
            text-align: center;
            max-width: 600px; /* Adjust the width as per your preference */
            margin-left: auto;
            margin-right: auto;
            flex: 1; /* Added */
            display: flex; /* Added */
            flex-direction: column; /* Added */
            justify-content: center; /* Added */
        }
        #comment-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
        }
        #comment-list li {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
      <!--NAVBAR-->
      <?php 
      include '../pages/navbar.php';
    ?>
    <div class="user-comments">
        <h2>Modify Comments</h2>
        <div class="comment-form">
            <br><br>
            <form method="POST">
                <label for="user_name">Your Name:</label>
                <input type="text" name="new_name" value="<?php echo $review['user_name']; ?>" required>
                <br>
                <label for="rating">Rating:</label>
                <select name="rating_update" required>
                    <option value="5">5 stars</option>
                    <option value="4">4 stars</option>
                    <option value="3">3 stars</option>
                    <option value="2">2 stars</option>
                    <option value="1">1 star</option>
                </select>
                <br>
                <label for="comment">Comment:</label>
                <textarea name="comment_update" required><?php echo $review['comment']; ?></textarea>
                <br>
                <input type="submit" name="create_review" value="Save Changes">
            </form>
        </div>
    </div>
</body>
</html>