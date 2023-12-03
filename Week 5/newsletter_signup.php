<?php
include '../sessions.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Newsletter</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
        include 'week5Nav.php'
    ?>
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
    <?php
    echo "<h1>Signup for our Newsletter</h1>";
    ?>
</div>

<div class="body">
    <?php
    echo "<h4>Enter your email address below to get our monthly newsletter!</h4>";
    ?>
    <!-- Reference: https://www.w3schools.com/tags/att_input_type_email.asp -->
    <form action="newsletter_thankyou.php">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Submit">
    </form>
    </body>
    </html>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>
