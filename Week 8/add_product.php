<?php
include '../database/database_connection.php';
include '../sessions.php';
//checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

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
    $productName = cleanUserInput($_POST["productName"]);
    $productDescription = cleanUserInput($_POST["productDescription"]);
    $productPrice = cleanUserInput($_POST["productPrice"]);
    $productPhoto = cleanUserInput($_POST["productPhoto"]);


    $sql = "INSERT INTO products (product_name, product_description, product_price, product_photo) VALUES (?, ?, ?, ?)";

    //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "ssds", $productName, $productDescription, $productPrice, $productPhoto);


        if (mysqli_stmt_execute($stmt)) {
            header("Location: product_management.php");
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
    echo "Invalid request method.";
}


header("Location: product_management.php");
exit();
?>
