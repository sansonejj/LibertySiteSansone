<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];


    $sql = "DELETE FROM site_user WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {

            header("Location: user_management.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }


        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }


    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
