<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if (isset($_GET['id'])) {
    $newsId = intval($_GET['id']);

    $sql = "DELETE FROM news_links WHERE id = ?";
    //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    if ($stmt = mysqli_prepare($conn, $sql)) {
//Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        mysqli_stmt_bind_param($stmt, "i", $newsId);



//Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        if (mysqli_stmt_execute($stmt)) {

            header("Location: news_management.php");
            exit();
        } else {

            echo "Error: " . mysqli_error($conn);
        }


        mysqli_stmt_close($stmt);
    } else {

        echo "Error preparing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "No news link ID provided.";
}


