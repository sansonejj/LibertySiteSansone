<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']);

function cleanUserInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = cleanUserInput($_POST["firstName"]);
    $lastName = cleanUserInput($_POST["lastName"]);
    $loginId = cleanUserInput($_POST["loginId"]);
    $password = cleanUserInput($_POST["password"]);
    $userPermissionGroup = cleanUserInput($_POST["userPermissionGroup"]);

    // Prepare SQL statement
    $sql = "INSERT INTO site_user (user_first_name, user_last_name, user_login_id, user_password, user_permission_group) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $firstName, $lastName, $loginId, $password, $userPermissionGroup);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to user management page after successful addition
            header("Location: user_management.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Redirect back to user management page if not a POST request
    header("Location: user_management.php");
    exit();
}
?>
