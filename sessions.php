<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Stores the original URL before in user session
if (isset($_SERVER['REQUEST_URI'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: /index.php/Week 4/loginForm.php');
    exit();
}

if (!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}

// Check if form is submitted for adding/updating items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity']) && isset($_POST['price'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Store or update the cart session
    $_SESSION['shopping_cart'][$product_id] = array(
        'quantity' => $quantity,
        'price' => $price
    );

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Check if form is submitted for deleting items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $product_id_to_delete = $_POST['product_id'];
    if (isset($_SESSION['shopping_cart'][$product_id_to_delete])) {
        unset($_SESSION['shopping_cart'][$product_id_to_delete]);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

function prodDetailID($productId) {
    //Defining global variables in function for the product id's
    global ${"product{$productId}_name"}, ${"product{$productId}_price"};
    return [
        'name' => ${"product{$productId}_name"},
        'price' => ${"product{$productId}_price"}
    ];
}

// Check if a product should be deleted from the cart
if (isset($_POST['delete_product'])) {
    //sends post if delete button is pressed in the cart to the shopping cart php file.
    $prod_id_to_remove = $_POST['product_id'];
    if (isset($_SESSION['shopping_cart'][$prod_id_to_remove])) {
        unset($_SESSION['shopping_cart'][$prod_id_to_remove]);
    }
}
?>

