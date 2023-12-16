<?php
include '../sessions.php';
checkUserGroup(['1', '2']); //1= Administrator, 2= Publisher, 3= Customer
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Site Administration</title>
    <!-- The link below points to the CSS styles sheet located in the root directory -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php
    include 'admin_nav.php';
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Site Administration Menu</h1>";
    ?>
</div>

<div class="body">
    <?php
    // This is where the body or text content will go
    echo "<p>Use the links above to manage different components of the website. If you are assigned the 'Publisher' role, 
            you may only edit the following page contents:</p>";
           echo "<ul>Comment Management</ul>";
           echo "<ul>News Link Management";

    ?>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
