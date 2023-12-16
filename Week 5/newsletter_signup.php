<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Newsletter</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include 'week5Nav.php'; ?>
</div>

<!--<style>-->
<!--    .navigation {-->
<!--        position: relative;-->
<!--    }-->
<!--    #shoppingCart {-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        right: 0;-->
<!--        color: white;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div id="shoppingCart">-->
<!--    --><?php //include 'shopping_cart.php'; ?>
<!--</div>-->

<div class="page-header">
    <h1>Signup for our Newsletter</h1>
</div>

<div class="body">
    <h4>Enter your email address below to get our monthly newsletter!</h4>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../database/database_connection.php';

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email) {
            $sql = "INSERT INTO newsletter_email (email) VALUES (?)";
            //https://www.w3schools.com/php/php_mysql_prepared_statements.asp
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                echo "<p>Thank you for signing up!</p>";
            } else {
                echo "<p>Error: Unable to sign up. Please try again later.</p>";
            }
        } else {
            echo "<p>Please enter a valid email address.</p>";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

</body>
</html>
