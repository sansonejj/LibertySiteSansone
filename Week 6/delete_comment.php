<?php
include '../database/database_connection.php';
include '../authenticated.php';

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

    // end the connection
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
