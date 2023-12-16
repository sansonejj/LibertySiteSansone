<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize shopping cart session if not set
if (!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}


function checkUserGroup($allowedGroups) {
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header('Location: /Week 4/loginForm.php');
        exit();

    } if (!in_array($_SESSION['user_group'], $allowedGroups)){
        header('Location: /Week 8/no_permission.php');
        exit();
    }
}


?>
