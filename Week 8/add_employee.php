<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer


//Reference for PHP Filtering: https://www.w3schools.com/php/php_filter.asp#:~:text=Validating%20data%20%3D%20Determine%20if%20the,illegal%20character%20from%20the%20data.
function cleanUserInput($data) {
    //Reference for stripping white spaces from beginning and end of string: https://www.php.net/manual/en/function.trim.php
    $data = trim($data);
    //Reference for getting rid of quotes in a string: https://www.php.net/manual/en/function.stripslashes.php
    $data = stripslashes($data);
    //Reference for converting special characters to html entities: https://www.php.net/manual/en/function.htmlspecialchars.php
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeName = cleanUserInput($_POST['employeeName']);
    $jobTitle = cleanUserInput($_POST['jobTitle']);
    $department = cleanUserInput($_POST['department']);
    $favoriteBook = cleanUserInput($_POST['favoriteBook']);
    $hobby = cleanUserInput($_POST['hobby']);
    $interests = cleanUserInput($_POST['interests']);


    $sql = "INSERT INTO employee (employee_name, employee_job_title, employee_department, employee_favorite_book, employee_hobby, employee_interests) VALUES (?, ?, ?, ?, ?, ?)";

    //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "ssssss", $employeeName, $jobTitle, $department, $favoriteBook, $hobby, $interests);



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

    mysqli_close($conn);
    header("Location: employee_management.php");
    exit();
}
?>
