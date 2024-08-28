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

</head>
  <body>
    <!--NAVBAR-->
    <?php 
      include 'navbar.php';
    ?>
    <!--Carousel-->
      <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="../images/cover-1.jpg" class="d-block w-100" alt="...">
            <a href="payag.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color:white;">Edsnath's Payag-Payag</h5>
              <p style="color:white;">Native huts with a great selection of foods and drinks for your family and friends to enjoy!</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="../images/cover-2.jpg" class="d-block w-100" alt="...">
            <a href="lantaw.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color:white;">Lantaw Cordova</h5>
              <p style="color:white;">Sunset is the best time to reserve a table if you want to enjoy stunning seaside views while having a delicious Filipino feast with friends and family.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/cover-3.jpg" class="d-block w-100" alt="...">
            <a href="top.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color:white;">Top Of Cebu</h5>
              <p style="color:white;">This Filipino restaurant offers an unobstructed view of Cebu City, providing guests with an unforgettable outdoor dining experience while enjoying an amazing view overlooking the city’s skyline.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
          <span class="visually-hidden">Previous</span>
        </button> 
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
      
      <!--Cards-->
      <div class="cards">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card" style="width: 18rem; height: 100%;">
                  <img src="../images/lavieinthesky.jpg" class="card-img-top w-100" alt="...">
                  <div class="card-body">
                    <p class="card-text">The company behind the “Little Paris” restaurant in Lahug, Cebu City is taking the French dining experience to a higher level (literally) via La Vie in the Sky, the newest mountain-top restaurant and winery located at the steep roads of Busay, Cebu City.</p>
                    <img style="align-items: center;"src="../images/emptystar.svg" alt="SVG Image" />
                    <a href="littleparis.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
                  </div>
              
              </div>
            </div>  
            <div class="col-sm-4">
              <div class="card" style="width: 18rem; height: 100%;">
                <img src="../images/ricos.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Rico’s Lechon provides an experience like “home” with its contemporary classic interiors that shows “Old Cebu with a twist. We also house a Lechon Fulfillment Center for whole lechon orders and take out counter pasalubong. </p>
                  <img style="align-items: center;"src="../images/emptystar.svg" alt="SVG Image" />
                  <a href="ricolechon.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card" style="width: 18rem; height: 100%;">
                <img src="../images/silogannigian.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Silogan ni Gian is a no-frills eatery that serves mostly silog meals.You can’t really go wrong with anything on their menu, but the sisig silog is one of my favorites. </p>
                  <img style="align-items: center;"src="../images/emptystar.svg" alt="SVG Image" />
                  <a href="giansilogan.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-sm-4">
              <div class="card" style="width: 18rem; height: 100%;">
                <img src="../images/cafelaguna.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">If there’s one restaurant Cebuanos millennials associate with Sunday lunch after mass, it’s Café Laguna.</p>
                  <img style="align-items: center;"src="../images/emptystar.svg" alt="SVG Image" />
                  <a href="cafelaguna.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card" style="width: 18rem; height: 100%;">
                <img src="https://3.bp.blogspot.com/-6GSOmJA2Jqk/XH74z8yB_FI/AAAAAAAANxo/tBUvFac3WM0KPdgyohu9l0JBQnkYsy_fACEwYBhgL/s1600/house-of-lechon-don-jose-avila13.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">House of Lechon officially opened last November 16, 2015 with the vision to bring the very famous Carcar Lechon to Cebu City and create a casual yet extraordinary dining experience. It is located within the heart of the city — on Acacia Street, just a few meters away from hotels, malls, hospitals and other commercial establishments.</p>
                  <img style="align-items: center;"src="../images/emptystar.svg" alt="SVG Image" />
                  <a href="houseoflechon.php" style="text-decoration: none; color: inherit;" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>