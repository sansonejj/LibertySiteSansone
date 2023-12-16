<!--//References: https://www.php.net/manual/en/mysqli.real-escape-string.php-->
<!--//https://www.w3schools.com/php/php_mysql_prepared_statements.asp-->
<!--//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_execute.htm-->
<!--//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_bind_result.htm-->
<!--//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_fetch.htm-->
<!--//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_close.htm-->
<!--https://www.w3schools.com/PHP/func_string_htmlspecialchars.asp-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Reach Out</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include 'week5Nav.php'; ?>
</div>

<!--<div id="shoppingCart">-->
<!--    --><?php //include 'shopping_cart.php'; ?>
<!--</div>-->

<div class="page-header">
    <h1>Reach Out to Us</h1>
</div>

<div class="body">
    <h3>Interested in more information?</h3>
    <p>Fill out the form below and someone from our team will reach out to discuss if a relationship between our firm and your agency makes sense.</p>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../database/database_connection.php';

        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['agency_email']);
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $agency_name = mysqli_real_escape_string($conn, $_POST['agency_name']);
        $agency_city = mysqli_real_escape_string($conn, $_POST['agency_city']);
        $agency_state = mysqli_real_escape_string($conn, $_POST['agency_state']);
        $agency_zip = mysqli_real_escape_string($conn, $_POST['agency_zip']);

        $sql = "INSERT INTO customer_info (first_name, last_name, agency_email, phone_number, agency_name, agency_city, agency_state, agency_zipcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $phone_number, $agency_name, $agency_city, $agency_state, $agency_zip);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "<p>Thank you for reaching out. We will contact you soon.</p>";
        } else {
            echo "<p>Error: Unable to submit your request. Please try again later.</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table class="centered-form">

            <tr>
                <td class="label-cell"><label for="first_name">First Name:</label></td>
                <td class="input-cell"><input type="text" id="text_fn" name="first_name" required></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="last_name">Last Name:</label></td>
                <td class="input-cell"><input type="text" id="text_ln" name="last_name" required></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="email">Email:</label></td>
                <td class="input-cell"><input type="email" id="agency_email" name="agency_email" required></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="phone">Phone Number:</label></td>
                <td class="input-cell"><input type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" id="phone_number" name="phone_number" placeholder="111-111-1111" required></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="agency_name">Agency Name:</label></td>
                <td class="input-cell"><input type="text" id="agency_name" name="agency_name" required></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="agency_city">City:</label></td>
                <td class="input-cell"><input type="text" id="agency_city" name="agency_city"></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="agency_state">State:</label></td>
                <td class="input-cell"><input type="text" id="agency_state" name="agency_state"></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="agency_zip">Zipcode:</label></td>
                <td class="input-cell"><input type="text" id="agency_zip" name="agency_zip"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

</body>
</html>
