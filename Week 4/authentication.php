<?php
session_start();
//Reference: https://www.w3schools.com/php/php_sessions.asp
if ($_POST['username'] === 'customer' && $_POST['password'] === 'customer') {
    $_SESSION['authenticated'] = true;
    header('Location: /Week 4/verifyLogin.php');
    exit();
} else {
    header('Location: ../Week 4/loginForm.php'); // redirect if auth fails
    exit();
}
?>
