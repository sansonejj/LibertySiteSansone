<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Sansone Liberty-Week 1</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="navigation">
    <?php
    include 'week1Nav.php'
    ?>

</div>

<div class="page-header">
    <?php
    echo "<h1>Week 1 Foundations</h1>";
    ?>
</div>

<div class="body">
    <?php
    // Use echo to add a paragraph
    echo "<p>Please use the links above to navigate to this week's assignments.</p>";
    ?>
</div>

<div class="custom-class1">
    <?php
    include 'pageModifiedDate.php';
    ?>
</div>

</body>
</html>

