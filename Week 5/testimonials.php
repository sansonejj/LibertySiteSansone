<?php
include '../sessions.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Testimonials</title>
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
    echo "<h1>Testimonials From Our Customers</h1>";
    ?>
</div>

<div class="body">
    <?php
        echo "<h4>City of Newport News, VA</h4> 
                <p>Sansone Liberty Consultants helped us navigate the murky waters of implementing a new CAD system. 
                    Their professionalism and experience proved to be invaluable.</p>";
           echo  "<h4>City of Austin, TX</h4> 
                    <p>The staff at Sansone Liberty made the process of upgrading our public safety radio
                        system a breeze. Their experience was clearly demonstrated during this 
                        challenging process.</p>";
           echo "<h4>New York, New York</h4>
                <p>Sansone Liberty helped us with implementing over 1,200 body cameras 
                 for our esteemed law enforcement officers. This implementation was ahead of schedule 
                 and below budget.";

    ?>
</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>
