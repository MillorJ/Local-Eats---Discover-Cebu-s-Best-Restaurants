<?php

// Function to create a review
function createReview($restaurantId, $userName, $rating, $comment)
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the INSERT statement
    $sql = "INSERT INTO reviews (restaurant_id, user_name, rating, comment, created_at) VALUES ($restaurantId, '$userName', $rating, '$comment', CURRENT_TIMESTAMP)";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

// Function to update a review
function updateReview($reviewId, $name, $rating, $comment)
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the UPDATE statement
    $sql = "UPDATE reviews SET user_name = ?, rating = ?, comment = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sisi", $name, $rating, $comment, $reviewId);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Function to delete a review
function deleteReview($reviewId)
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the DELETE statement
    $sql = "DELETE FROM reviews WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $reviewId);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function getNumReviews($id)
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the SELECT statement
    $sql = "SELECT * FROM reviews WHERE restaurant_id = $id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    return $rows;
}

// Function to get all reviews
function getAllReviews($id)
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the SELECT statement
    $sql = "SELECT * FROM reviews WHERE restaurant_id = $id";
    $result = mysqli_query($conn, $sql);

    $i = 0;
    // Fetch all rows as an associative array
    while($reviews[$i] = mysqli_fetch_array($result)) {
        $i++;
    }

    // Free the result set
    mysqli_free_result($result);

    return $reviews;
}

// Function to get all reviews
function getReview($id)
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'localeats_db';

    // Create database connection
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Check if connection was successful
    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Prepare the SELECT statement
    $sql = "SELECT * FROM reviews WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    // Fetch all rows as an associative array
    $reviews = mysqli_fetch_array($result);

    // Free the result set
    mysqli_free_result($result);

    return $reviews;
}
?>
