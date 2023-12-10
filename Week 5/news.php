<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>In The News</title>
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
    echo "<h1>Our Products In The News</h1>";
    ?>
</div>

<div class="body">
    <?php
    echo "<a href=\"https://apnews.com/article/police-body-cameras-shooting-914729c87b65c102acc766e713031f63\">Associated Press - Body Cameras</a>";
    ?>

    <?php
    echo "<br><a href=\"https://www.delcopa.gov/publicrelations/releases/2023/dcupgradedsafetyradiosystem.html\">Delaware County Radio Upgrade</a>";
    ?>

    <?php
    echo "<br><a href=\"https://news.va.gov/press-room/va-police-begin-to-use-body-cams-and-dash-cams\">Virginia Police Begin To Use Body Cams and Dash Cams</a>";
    ?>

    <?php
    echo "<br><a href=\"https://www.chicomm.com/blog/why-to-upgrade-your-police-radio-fleet-from-analog-to-digital\">Why Upgrade Your Police Radio Fleet from Analog to Digital</a>";
    ?>

    <?php
    echo "<br><a href=\"https://www.messenger-inquirer.com/news/911-upgrade-improves-radio-connection-in-county-schools-nave-says/article_dee43c4d-1b58-5911-964e-1c4352e6bbab.html\">911 upgrade improves radio connection in county schools</a>";
    ?>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

<!--  -->
</body>
</html>
