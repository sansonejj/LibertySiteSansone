<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);

    $sql = "DELETE FROM products WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "i", $productId);

//Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        if (mysqli_stmt_execute($stmt)) {
            echo "Product deleted successfully.";
            //dssplay any errors thrown with the connection/query with database
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Product ID required.";
}
header("Location: product_management.php");
exit();

