<?php
include '../database/database_connection.php';
include '../sessions.php';
include '../cart_sessions.php';
checkUserGroup(['1', '2', '3']); //1= Administrator, 2= Publisher, 3= Customer
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Product Listing</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <style type="text/css">
        .product-table {
            border-collapse: separate;
            width: 100%;
        }

        .product-block {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            width: 33%;
        }

        .product-img {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
</head>
<body>

<div class="shopping-cart"></div>
<div class="navigation">
    <?php include 'week5Nav.php'; ?>
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
        <?php include '../Week 5/shopping_cart.php'; ?>
    </div>
</div>

<div class="page-header">
    <h1>Product Listing</h1>
    <br><a href="cart.php" class="view-cart-button">View Cart</a>
</div>
<div class="body">
    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='product-table'><tr>";
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<td class='product-block'>";
            echo "<form action='' method='post'>";
            echo "<h2>" . htmlspecialchars($row['product_name']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['product_description']) . "</p>";
            echo "<img src='" . htmlspecialchars($row['product_photo']) . "' alt='" . htmlspecialchars($row['product_name']) . "' class='product-img'>";
            echo "<p>Price: $" . htmlspecialchars($row['product_price']) . "</p>";
            echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
            echo "<input type='hidden' name='price' value='" . $row['product_price'] . "'>";
            echo "QTY:<input type='number' name='quantity' value='0' min='1' max='200'>";
            echo "<br><button type='submit'>Add to Cart</button>";
            echo "</form>";
            echo "</td>";

            $count++;
            if ($count % 3 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr></table>";
    } else {
        echo "<p>No products found.</p>";
    }
    ?>

</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>
<?php include '../click_logout.php'; ?>

</body>
</html>
