<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

function fetchProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    //Reference Fetching: https://www.php.net/manual/en/function.mysql-fetch-field.php
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function truncateText($text, $maxWords) {
    $words = explode(' ', $text);
    if (count($words) > $maxWords) {
        return implode(' ', array_slice($words, 0, $maxWords)) . '...';
    }
    return $text;
}

$products = fetchProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <!-- JS toggling form function Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp -->
    <script>
        function toggleAddProductForm() {
            /*Getting Element Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp */
            var form = document.getElementById("addProductForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
<div class="navigation">
    <?php include 'admin_nav.php'; ?>
</div>

<div class="page-header">
    <h1>Product Management</h1>
</div>

<div class="body_centered">
    <?php
    if (count($products) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Actions</th></tr>";
        foreach($products as $product) {
            $truncatedDescription = truncateText($product["product_description"], 15);
            echo "<tr>";
            echo "<td>".$product["id"]."</td>";
            echo "<td>".$product["product_name"]."</td>";
            echo "<td>".$truncatedDescription."</td>";
            echo "<td>".$product["product_price"]."</td>";
            echo "<td><a href='edit_product.php?id=".$product['id']."'>Edit</a> | <a href='delete_product.php?id=".$product['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }
    ?>
</div>

<div style="margin-bottom: 20px;">
    <button onclick="toggleAddProductForm()">Add Product</button>
    <div id="addProductForm" style="display:none;">
        <form method="post" action="add_product.php" class="form-row">
            <label>Name:<input type="text" name="productName"></label>
            <label>Description:<textarea name="productDescription"></textarea></label>
            <label>Price:<input type="text" name="productPrice"></label>
            <label>Photo URL:<input type="text" name="productPhoto"></label>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
