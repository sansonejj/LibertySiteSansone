<?php
include '../database/database_connection.php';
include '../sessions.php';
include '../cart_sessions.php';
checkUserGroup(['1', '2', '3']); //1= Administrator, 2= Publisher, 3= Customer
//References: https://www.php.net/manual/en/mysqli.real-escape-string.php
//https://www.w3schools.com/php/php_mysql_prepared_statements.asp
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_execute.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_bind_result.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_fetch.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_close.htm
//https://www.php.net/manual/en/function.number-format.php
function getProductDetails($conn, $productId) {
    $sql = "SELECT product_name, product_price FROM products WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $productName, $productPrice);
        if (mysqli_stmt_fetch($stmt)) {
            mysqli_stmt_close($stmt);
            return ['name' => $productName, 'price' => $productPrice];
        }
        mysqli_stmt_close($stmt);
    }
    return null;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>

<div class="navigation">
    <?php include 'week5Nav.php'; ?>
</div>

<style>
    .navigation {
        position: relative;
    }
    #shoppingCart {
        position: absolute;
        top: 0;
        right: 0;
        color: white;
    }
</style>

<div id="shoppingCart">
    <!-- Pulls session data from the user session and the items and total in their cart -->
    <?php include 'shopping_cart.php'; ?>
</div>

<div class="page-header">
    <h1>Cart</h1>
</div>

<div class="body" align="center">
    <form method="post" action="">
        <table class="product-table">
            <tr align="left">
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Per Item</th>
                <th>Total Cost</th>
                <th>Action</th>
            </tr>
            <?php
            $totalGrossCost = 0;
            foreach ($_SESSION['shopping_cart'] as $product_id => $item) {
                $productDetails = getProductDetails($conn, $product_id);
                if ($productDetails) {
                    $lineCost = $item['quantity'] * $productDetails['price'];
                    $totalGrossCost += $lineCost;
                    echo "<tr>";
                    echo "<td class='product-block'>{$productDetails['name']}</td>";
                    echo "<td class='product-block'>{$item['quantity']}</td>";
                    echo "<td class='product-block'>\${$productDetails['price']}</td>";
                    echo "<td class='product-block'>\${$lineCost}</td>";
                    echo "<td class='product-block'>
                            <input type='hidden' name='product_id' value='$product_id'>
                            <input type='submit' name='delete_product' value='Delete'>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </form>
    <br>
    <table>
        <tr>
            <th colspan="3" style="text-align: right;">Gross Cost:</th>
            <th>$<?php echo number_format($totalGrossCost, 2); ?></th>
            <?php
            $tax = $totalGrossCost * 0.05;
            $totalNetCost = $totalGrossCost + $tax;
            ?>
        </tr>
        <tr>
            <th colspan="3" style="text-align: right;">Tax:</th>
            <th>$<?php echo number_format($tax, 2) ?></th>
        </tr>
        <tr>
            <th colspan="3" style="text-align: right;">Net Cost:</th>
            <th>$<?php echo number_format($totalNetCost, 2) ?></th>
        </tr>
    </table>
    <form action="purchase_confirmation.php">
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
                <td class="label-cell"><label for="ccn">Credit Card Number:</label></td>
                <td class="input-cell">
                    <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" minlength="12" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
                </td>
            </tr>
        </table>
        <div><input type="submit" value="Complete Purchase"></div>
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>
</body>
</html>
