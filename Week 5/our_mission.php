<?php
include '../sessions.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Our Mission</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<div class="shopping-cart">

</div>
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
    <?php include '../Week 5/shopping_cart.php'; ?>
</div>
</div>

<div class="page-header">
    <?php
    echo "<h1>Our Mission</h1>";
    ?>
</div>

<div class="paragraph">
    <?php
    echo "<div class='body' align='center'><h3 style='font-style: italic;'>And do not forget to do good and to share 
            with others, for with such sacrifices God is pleased</h3></div>";
    echo "<div class='body' align='center'><h4>Hebrews 13:16</h4></div>";

    echo "<p>Our mission is to assist public safety organizations in undertaking challenging and intensive technology
             initiatives. These projects are designed to enhance a public safety agency's ability
             and capacity to serve and protect their community more effectively. We hold a firm biblical conviction
             that every community and individual in society, irrespective of the serving public safety agency's
             size or budget, or their demographics, deserves the highest standard of protection. This extends
             to the dedicated men and women that serve in these agencies, who put their lives on the line every
             day for complete strangers. Our commitment is to provide public saftey agency's with the tools,
             strategies, and support they need to excel in their roles. By doing so, we contribute to building 
             safer, more resilient communities where every person can feel secure and valued. Our approach is 
             tailored to meet the unique needs and challenges of each agency, ensuring that every community,
             no matter how large or small, has access to the best possible resources and expertise in public 
             safety.</p>";
    ?>
</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>


</body>
</html>
