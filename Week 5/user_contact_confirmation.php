<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Thank You</title>
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
    echo "<h1>We'll Be In Touch</h1>";
    ?>
</div>

<div class="body">
    <?php
    echo "<p>Thank you for reaching out. A member of our team will reach out to you within 3 business days.</p>";
    ?>
</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>
