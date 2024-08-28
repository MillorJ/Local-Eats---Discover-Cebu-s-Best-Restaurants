<?php 
    session_start();

    include 'db_config.php';

    if (!isset($_POST['submit'])) {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $password = $_POST['password'];

        // Check if user already exists
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $_SESSION['register_error'] = 'Account Already Exists.';
            header('Location: ../pages/register.php');
            return;
        }

        //Hash the Password
        $hpassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user to the database
        $sql = "INSERT INTO `users` (email, username, first_name, last_name, password, created_at)
                     VALUES ('$email', '$username', '$firstname', '$lastname', '$hpassword', CURRENT_TIMESTAMP)";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['register_success'] = "Account created succesfully.";
        } else {
            $_SESSION['register_error'] = 'Account creation is unsuccessful.';
        }

        header('Location: ../pages/register.php');
    }
?>