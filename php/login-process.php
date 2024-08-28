<?php
session_start();

include 'db_config.php';

if (!isset($_POST['submit'])) {
    $email_or_username = $_POST['email'];
    $password = $_POST['password'];

    // Look for the user in the database
    $sql = "SELECT * FROM `users` 
            WHERE (username = '$email_or_username' OR email = '$email_or_username')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hPassword = $row['password'];
        
        //verify the hashedzpw against the entered pw
        if (password_verify($password, $hPassword)) {
            $_SESSION['logged_in'] = true;
            header('Location: ../pages/index.php');
        } else {
            $_SESSION['login_error'] = 'Incorrect Password.';
            header('Location: ../pages/login.php');
        }
    } else {
        $_SESSION['login_error'] = 'User not Found.';
        header('Location: ../pages/login.php');
    }
}
?>
