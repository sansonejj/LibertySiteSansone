<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if (isset($_GET['id'])) {
    $employeeId = intval($_GET['id']);

    $sql = "DELETE FROM employee WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "i", $employeeId);
        //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php

        if (mysqli_stmt_execute($stmt)) {
            header("Location: employee_management.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

