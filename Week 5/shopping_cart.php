<?php

function getCartItemCount() {
    if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
        $totalItems = 0;
        foreach ($_SESSION['shopping_cart'] as $item) {
            $totalItems += $item['quantity'];
        }
        return $totalItems;
    } else {
        return 0;
    }
}

function getCartTotalCost() {
    if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
        $totalCost = 0;
        foreach ($_SESSION['shopping_cart'] as $item) {
            $totalCost += $item['quantity'] * $item['price'];
        }
        return $totalCost;
    } else {
        return 0;
    }
}



?>




<body>
<div id="shopping-cart">
    <p>Cart: <?php echo getCartItemCount()  .'  ' . 'Items' . '    ' . '$' . getCartTotalCost(); ?></p>


</div>
</body>
