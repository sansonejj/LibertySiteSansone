<?php
session_start();

// Checking if the user is properly signed in
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: loginForm.php');
    exit();
}


if (isset($_SESSION['redirect_url'])) {
    $redirect_url = $_SESSION['redirect_url'];
    unset($_SESSION['redirect_url']);
    header('Location: ' . $redirect_url);
    exit();
} else {
    header('Location: /w1_AboutUs.php');
    exit();
}
?>
