<!--References: https://www.w3schools.com/Php/func_mysqli_num_rows.asp-->
<!--https://www.tutorialspoint.com/php/php_function_mysqli_stmt_fetch.htm-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>In The News</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include 'week5Nav.php'; ?>
</div>

<!--<style>-->
<!--    .navigation {-->
<!--        position: relative;-->
<!--    }-->
<!--    #shoppingCart {-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        right: 0;-->
<!--        color: white;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div id="shoppingCart">-->
<!--    --><?php //include 'shopping_cart.php'; ?>
<!--</div>-->

<div class="page-header">
    <h1>Our Products In The News</h1>
</div>

<div class="body">
    <?php
    include '../database/database_connection.php';

    $sql = "SELECT title, hyperlink FROM news_links";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=\"" . htmlspecialchars($row['hyperlink']) . "\">" . htmlspecialchars($row['title']) . "</a><br>";
        }
    } else {
        echo "<p>No news links found.</p>";
    }
    ?>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

</body>
</html>
