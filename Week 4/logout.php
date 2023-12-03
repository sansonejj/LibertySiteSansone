<?php
// Initializes the session.
session_start();

// Unset all of the session variables.
$_SESSION = array();


if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destroys the session.
session_destroy();
header('Location: ../logout_confirmation.php'); //redirects to the logout_confirmation page
?>