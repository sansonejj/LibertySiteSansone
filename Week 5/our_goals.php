<?php
include '../sessions.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Company Goals</title>
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
    <?php include '../Week 5/shopping_cart.php'; ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Sansone Liberty Goals</h1>";
    ?>
</div>

<div class="body">
    <?php
    echo "<h3>What are the goals of our company?</h3>";
    echo "<h4>Enhanced Training Programs</h4>";
    echo "<p>Develop comprehensive training programs for public safety personnel, focusing on modern techniques,
             crisis management, and community engagement to ensure agencies are well-prepared for a variety of scenarios</p>";
    echo "<h4>Advanced Technology Integration</h4>";
    echo "<p>Facilitate the integration of cutting-edge technology and tools that improve response times,
             communication, and data management</p>";
    echo "<h4>Sustainability and Resiliency</h4>";
    echo "<p>Encourage practices that enhance the sustainability and resilience of public safety services in the face of changing
            social, environmental, and technological landscapes</p>";

    ?>
</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>


</body>
</html>
