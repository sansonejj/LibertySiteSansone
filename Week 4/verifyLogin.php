<?php
session_start();

// Define an associative array with usernames and their corresponding passwords
$user_creds = [
    'customer' => 'customer',
    'publisher' => 'publisher', // Second username and password
    'admin' => 'admin'  // Third username and password
];

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the posted credentials exist in the user_creds array
    if (isset($user_creds[$username]) && $user_creds[$username] === $password) {
        $_SESSION['authenticated'] = true;

        // Check if there's a stored URL to redirect to
        if (isset($_SESSION['redirect_url'])) {
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header('location: ' . $redirect_url);
        } else {
            header('location: ../index.php');
        }
        exit();
    }
}

// Store the original URL in a session variable before redirecting to the login page
if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['redirect_url'] = $_SERVER['HTTP_REFERER'];
}

// Redirect to the login page
header('Location: ../Week 4/loginForm.php');
exit();
?>
