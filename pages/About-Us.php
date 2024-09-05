<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
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
                <img src="https://scontent.fceb3-1.fna.fbcdn.net/v/t39.30808-6/429666900_2505048093008152_1418366835154342163_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGAz3TEZLvrZnj8tJOiltSEpYe4GoCcaIelh7gagJxohxEr0Iq82p0X1CtMQRP-1iRw35a7-wqty-VijepUh2mD&_nc_ohc=PHFjU1F5TCkQ7kNvgH3KYBO&_nc_ht=scontent.fceb3-1.fna&oh=00_AYCrouxbMyi9wCjOpkeCYgPynpqObCv8C6cnGYwW5UlADQ&oe=66DF717A" alt="Image 1">
                <h3>Iann James Andrei Sagun</h3>
                <p>IT 1st Year (Front-End)</p>
            </div>

            <div class="item">
                <img src="https://scontent.fceb3-1.fna.fbcdn.net/v/t39.30808-6/346471162_788548585868242_471467618750634535_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFedAJODX66607oC7BAkVhtjzrRXMuGHTiPOtFcy4YdODR_zSKmjf1mEJnyjamhavUOvyKMbLIa9ppMSplboPeW&_nc_ohc=O8FX9QCyKB0Q7kNvgEoH4Zo&_nc_ht=scontent.fceb3-1.fna&_nc_gid=AyRijS9c9ej6Y8xBQkEEOsd&oh=00_AYAzzlT-6Tyi8NZaGwHFRKj_M4kEfKTpVATquxi5nG-aqw&oe=66DF7284" alt="Image 2">
                <h3>Kyle Yvan G. Baculao</h3>
                <p>IT 1st Year (Front-End)</p>
            </div>

            <div class="item">
                <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/346157762_253743613818837_2316398875283032900_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeFjabUhd6Krj_f2miYEN_C7vojsGT9-5Y2-iOwZP37ljbY1PMUdLZrpQWIUs_MOx3ag_ERVSyJXFTau0tmMuEo9&_nc_ohc=vmxxlvgNh9oAX_NvNjg&_nc_ht=scontent.fceb2-2.fna&oh=03_AdQ_dGlKlMP3O8YRQNiMKF5rQo5vnZCP89vIkEttbQKVyw&oe=6489B2CF" alt="Image 3">
                <h3>Patricia Albertina L. Quijano</h3>
                <p>BSCS 1st Year (Back-End)</p>
            </div>

            <div class="item">
            <img src="https://scontent.fceb3-1.fna.fbcdn.net/v/t39.30808-6/457558912_8076490065805683_5068600372314719825_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFS-ycp3LLkplf8LNe_8HufRCurHpIWwQBEK6sekhbBAI77npUGrNNGWD_X_rgCzNSmxexbm7gV1-sm176ux-RX&_nc_ohc=w71SwNcRpdcQ7kNvgEGMLK9&_nc_ht=scontent.fceb3-1.fna&oh=00_AYAMf0Y5WUyajE6fpTWTWENtB9emoHls4xPSrihN0_nhbw&oe=66DF6262" alt="Image 4">
                <h3>John Rey Millor</h3>
                <p>IT 1st Year (Full Stack Developer / Project Manager)</p>
            </div>
        </div>
    </div>
</body>

</html>