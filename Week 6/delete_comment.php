<?php
include '../database/database_connection.php';
//include '../authenticated.php';
include '../sessions.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $comment_id = $_GET['id'];

    // Reference for prepared statements to help address sql injection: https://stackoverflow.com/questions/18426172/what-does-bind-param-accomplish
    $stmt = $conn->prepare("DELETE FROM Comments WHERE id = ?");
    $stmt->bind_param("i", $comment_id);
    //Reference: https://stackoverflow.com/questions/9991882/stmt-execute-how-to-know-if-db-insert-was-successful
     if($stmt->execute()) {

        header("Location: comment_management.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // term the connection
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
