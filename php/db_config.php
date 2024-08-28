<?php
// Define database connection variables
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