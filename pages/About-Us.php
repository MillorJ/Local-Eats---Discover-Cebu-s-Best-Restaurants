<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // user is not logged in, redirect to login page
    //  header('Location: login.php');
    header('Location: login.php?show_overlay=true');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Bootsrap JS-->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--Restaurant Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Custom FavIcon-->
    <link rel="shortcut icon" href="../images/fav-ico.png" type="image/x-icon">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!--Custom CSS-->
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/aboutus.css">
    <!--Goolge API Styles-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Local Eats</title>
    <style>
        <?php include '../css/about.css'; ?>
    </style>
</head>

<body>
    <!--NAVBAR-->
    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <h1 style="font-size: 70px;">Local Eats</h1>
        <p>Welcome to our <b><i>Local Eats</i></b>, dedicated to showcasing the finest local restaurants and shops that serve exceptional food in your area.
            Discovering hidden gems and supporting small businesses that offer delectable culinary experiences. With our carefully curated selection, we bring you a handpicked list of eateries and establishments
            that prioritize quality ingredients, innovative flavors, and memorable dining experiences. Join us as we explore the culinary talents and flavors of local businesses, inviting you to savor the very best that your community has to offer.</p>

        <div class="row">
            <div class="item">
                <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.15752-9/279284236_727655675238441_3528796320343643131_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeHW6KXqJlrw_NQn8-jmxA1QOK53N6b071Q4rnc3pvTvVAR3nnbI5WuiFtWENTkMH8gyXTzJxVPuy8SjD96P6om6&_nc_ohc=7VN_Yp1W0QgAX9YLlAa&_nc_ht=scontent.fceb2-1.fna&oh=03_AdR_dsRT46UmwhYvJGa42ONnugcYJsaNynKkdmw4STQ00A&oe=6489BB7B" alt="Image 1">
                <h3>Iann James Andrei Sagun</h3>
                <p>IT 1st Year (Front-End)</p>
            </div>

            <div class="item">
                <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.15752-9/346103239_178503765158151_8853636744729080577_n.png?_nc_cat=111&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeGNmhfHnI--6_ew6pjqXnqCZSNC4bScYeplI0LhtJxh6tI2XYD_HXoMJbYsBN49inRmvaV03-zvn0JdM0RNC8q9&_nc_ohc=x54b59Zl3YYAX9yKmH9&_nc_ht=scontent.fceb2-1.fna&oh=03_AdRreIflES8jr7Sm5zCkprjBRuI8AS72TTbBbsdQQNI_MQ&oe=6489C1E9" alt="Image 2">
                <h3>Kyle Yvan G. Baculao</h3>
                <p>IT 1st Year (Front-End)</p>
            </div>

            <div class="item">
                <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/346157762_253743613818837_2316398875283032900_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeFjabUhd6Krj_f2miYEN_C7vojsGT9-5Y2-iOwZP37ljbY1PMUdLZrpQWIUs_MOx3ag_ERVSyJXFTau0tmMuEo9&_nc_ohc=vmxxlvgNh9oAX_NvNjg&_nc_ht=scontent.fceb2-2.fna&oh=03_AdQ_dGlKlMP3O8YRQNiMKF5rQo5vnZCP89vIkEttbQKVyw&oe=6489B2CF" alt="Image 3">
                <h3>Patricia Albertina L. Quijano</h3>
                <p>BSCS 1st Year (Back-End)</p>
            </div>

            <div class="item">
            <img src="images/" alt="Image 4">
                <h3>John Rey Millor</h3>
                <p>IT 1st Year (Full Stack Developer / Project Manager)</p>
            </div>
        </div>
    </div>
</body>

</html>