<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer
function cleanUserInput($data) {
    //Reference: https://www.php.net/manual/en/function.trim.php
    $data = trim($data);
    //Reference: https://www.php.net/manual/en/function.stripslashes.php
    $data = stripslashes($data);
    //Reference: https://www.php.net/manual/en/function.htmlspecialchars.php
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $customerId = intval($_POST['customerId']);
    $firstName = cleanUserInput($_POST['firstName']);
    $lastName = cleanUserInput($_POST['lastName']);
    $email = cleanUserInput($_POST['email']);
    $phone = cleanUserInput($_POST['phone']);
    $agencyName = cleanUserInput($_POST['agencyName']);
    $city = cleanUserInput($_POST['city']);
    $state = cleanUserInput($_POST['state']);
    $zipcode = cleanUserInput($_POST['zipcode']);

    $sql = "UPDATE customer_info SET first_name = ?, last_name = ?, agency_email = ?, phone_number = ?, agency_name = ?, agency_city = ?, agency_state = ?, agency_zipcode = ? WHERE id = ?";

    //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "ssssssssi", $firstName, $lastName, $email, $phone, $agencyName, $city, $state, $zipcode, $customerId);
        //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        if (mysqli_stmt_execute($stmt)) {
            header("Location: customer_management.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


$customer = null;
if (isset($_GET['id'])) {
    $customerId = intval($_GET['id']);

    $sql = "SELECT * FROM customer_info WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
        mysqli_stmt_bind_param($stmt, "i", $customerId);

        mysqli_stmt_execute($stmt);
        //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        //Reference: https://www.php.net/manual/en/mysqli-stmt.get-result.php
        $result = mysqli_stmt_get_result($stmt);
        $customer = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
}

if (!$customer) {
    echo "No customer found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include 'admin_nav.php'; ?>
</div>

<div class="page-header">
    <h1>Edit Customer</h1>
</div>

<div class="body_centered">
    <form method="post" action="edit_customer.php">
        <input type="hidden" name="customerId" value="<?php echo $customer['id']; ?>">
        <label>First Name:<input type="text" name="firstName" value="<?php echo $customer['first_name']; ?>"></label>
        <label>Last Name:<input type="text" name="lastName" value="<?php echo $customer['last_name']; ?>"></label>
        <label>Email:<input type="email" name="email" value="<?php echo $customer['agency_email']; ?>"></label>
        <label>Phone Number:<input type="tel" name="phone" value="<?php echo $customer['phone_number']; ?>"></label>
        <label>Agency Name:<input type="text" name="agencyName" value="<?php echo $customer['agency_name']; ?>"></label>
        <label>City:<input type="text" name="city" value="<?php echo $customer['agency_city']; ?>"></label>
        <label>State:<input type="text" name="state" value="<?php echo $customer['agency_state']; ?>"></label>
        <label>Zipcode:<input type="text" name="zipcode" value="<?php echo $customer['agency_zipcode']; ?>"></label>
        <input type="submit" name="update" value="Update Customer">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
