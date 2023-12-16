<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1', '2']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $hyperlink = $_POST['hyperlink'] ?? '';


    $sql = "INSERT INTO news_links (title, hyperlink) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $title, $hyperlink);

        if (mysqli_stmt_execute($stmt)) {

            header("Location: news_management.php");
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
    header("Location: /Week 8/news_management.php");
    exit();
}
