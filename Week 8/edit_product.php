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
    $productId = intval($_POST['productId']);
    $productName = cleanUserInput($_POST['productName']);
    $productDescription = cleanUserInput($_POST['productDescription']);
    $productPrice = cleanUserInput($_POST['productPrice']);
    $productPhoto = cleanUserInput($_POST['productPhoto']);

    $sql = "UPDATE products SET product_name = ?, product_description = ?, product_price = ?, product_photo = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssdsi", $productName, $productDescription, $productPrice, $productPhoto, $productId);

        if (mysqli_stmt_execute($stmt)) {
            echo "Product updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: product_management.php");
    exit();
}


if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);


    $sql = "SELECT * FROM products WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if (!$product) {
            echo "Product not found.";
            exit;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "No product ID provided.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <h1>Edit Product</h1>
</div>

<div class="body_centered">
    <form method="post" action="edit_product.php">
        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
        <label>Name:<input type="text" name="productName" value="<?php echo $product['product_name']; ?>"></label>
        <label>Description:<textarea name="productDescription"><?php echo $product['product_description']; ?></textarea></label>
        <label>Price:<input type="text" name="productPrice" value="<?php echo $product['product_price']; ?>"></label>
        <label>Photo URL:<input type="text" name="productPhoto" value="<?php echo $product['product_photo']; ?>"></label>
        <input type="submit" name="update" value="Update Product">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>
</body>
</html>
