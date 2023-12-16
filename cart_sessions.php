<?php
session_start();


if (!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['quantity'], $_POST['price'], $_POST['product_id'])) {
        $_SESSION['shopping_cart'][$_POST['product_id']] = array(
            'quantity' => $_POST['quantity'],
            'price' => $_POST['price']
        );

    }


    if (isset($_POST['delete_product'])) {
        $product_id_to_delete = $_POST['product_id'];
        if (isset($_SESSION['shopping_cart'][$product_id_to_delete])) {
            unset($_SESSION['shopping_cart'][$product_id_to_delete]);

        }
    }
}
?>
