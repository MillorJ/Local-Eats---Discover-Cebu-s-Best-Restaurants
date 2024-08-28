<?php
    if (isset($_GET['id'])) {
        
        require_once 'review_functions.php';
        $reviewIdToDelete = $_GET['id'];
    
        deleteReview($reviewIdToDelete);
        header("Location: ../pages/index.php");
        exit();
    }
?>