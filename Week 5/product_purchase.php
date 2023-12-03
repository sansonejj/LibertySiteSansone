<?php
include '../authenticated.php';
include '../sessions.php';
include 'products/product_variables.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Product Listing</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

    <!-- custom CSS class for this page, building a table setting columns equal size -->
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

<div class="shopping-cart">


</div>
<div class="navigation">
    <?php
    include 'week5Nav.php';
    ?>

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
    <?php
    echo "<h1>Product Listing</h1>";
    ?>
    <br><a href="cart.php" class="view-cart-button">View Cart</a>
</div>
<div class="body">
    <?php
    include '../Week 5/products/product_variables.php';
    //Reference: https://www.w3schools.com/tags/tag_td.asp
    function showProductTable($productId, $name, $description, $photo, $price) {
          echo "<td class='product-block'>";
        echo "<form action='' method='post'>";
        echo "<h2>$name</h2>";
        echo "<p>$description</p>";
         echo "<img src='$photo' alt='$name' class='product-img'>";
        echo "<p>Price: $$price</p>";
        echo "<input type='hidden' name='product_id' value='$productId'>";
         echo "<input type='hidden' name='price' value='$price'>";
        echo "QTY:<input type='number' name='quantity' value='0' min='1' max='200'>";
          echo "<br><button type='submit'>Add to Cart</button>";
        echo "</form>";
         echo "</td>";
    }
    //This loop will pass data into the function above to echo the information from include statement on line 70 for
    //product_variables.php
    echo "<table class='product-table'><tr>";
    for ($i = 1; $i <= 10; $i++) {
        showProductTable($i, ${"product{$i}_name"}, ${"product{$i}_description"}, "products/" . ${"product{$i}_photo"}, ${"product{$i}_price"});

        //for every 3 items, start a new row
        if ($i % 3 == 0) {
            echo "</tr><tr>";
        }
    }
    echo "</tr></table>";
    ?>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>
<?php
include '../click_logout.php'
?>

</body>
</html>

