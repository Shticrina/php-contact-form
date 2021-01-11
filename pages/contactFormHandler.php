<?php

include('../database/db.php');

// Initialize a session
session_start();

// we initiate an array that will contain any potential errors.
$errors = array();

if (isset($_POST['submitBtn'])) {
    $errors = array();

    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        // 1. Sanitisation
        $name = htmlspecialchars($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // 2. Validation
        if (!preg_match('/^[a-z]*$/i', $name)) {
            // $errors['name'] = "The name is invalid!";
            $_SESSION['errors']['name'] = "The name is invalid!";
        }

        if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
           // $errors['email'] = "The email address is invalid!";
            $_SESSION['errors']['email'] = "The email address is invalid!";
        }
    } else {
        // $errors['empty'] = "Empty fields! Please verify all the fields and try again.";
        $_SESSION['errors']['empty'] = "Empty fields! Please verify all the fields and try again.";
    }
}

if (count($_SESSION['errors']) > 0) {
    header('Location: contact_us.php');
} else {
    // save the data into database
    
    // redirect to homepage with message
    header('Location: ../index.php');
}

?>