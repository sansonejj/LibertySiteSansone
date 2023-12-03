<?php

function getCartItemCount() {
    //Reference: https://stackoverflow.com/questions/18764103/foreach-session-as-value-get-array-key-of-session
    // Checking that the shopping cart session is set and is an array. If isset determines the session
    //variable is in array and if so, set $totalItems to 0.
    if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
        $totalItems = 0;
        // Loop through each item incart
        foreach ($_SESSION['shopping_cart'] as $item) {
            // Add the quantity of each item to the total
            $totalItems += $item['quantity'];
        }
        return $totalItems;
    } else {
        return 0;
    }
}

function getCartTotalCost() {
    //Reference: https://stackoverflow.com/questions/18764103/foreach-session-as-value-get-array-key-of-session
    // Check if the shopping cart session is set and is an array
    if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
        $totalCost = 0;
        // Loop through each item in the cart
        foreach ($_SESSION['shopping_cart'] as $item) {
            // Add the cost of each item (quantity * price) to the total cost
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
