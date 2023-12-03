<?php
session_start();
// Define an associative array with usernames and their corresponding passwords
$user_credentials = [
    'customer' => 'customer',
    'publisher' => 'publisher', // Add the second username and password
    'admin' => 'admin'  // Add the third username and password
];

// Check if the posted credentials exist in the user_creds array
if (isset($_POST['username'], $_POST['password']) &&
    isset($user_credentials[$_POST['username']]) &&
    $user_credentials[$_POST['username']] === $_POST['password']) {

    $_SESSION['authenticated'] = true;
    header('Location: ../Week 4/verifyLogin.php');
    exit();
} else {
    header('Location: Week 4/loginForm.php'); // redirect if auth fails
    exit();
}
?>
