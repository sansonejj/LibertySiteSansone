<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Sansone Liberty</title>
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
    echo "<h1>About Us</h1>";
    ?>
</div>

<div class="paragraph">
    <?php
    // Use echo to add a paragraph
    echo "<p>Here at Sansone Liberty, we offer expertise and decades of experience to public safety agencies throughout the country.
    Our staff has over 200 years of combined experience serving operational and support roles in the public safety sector.</p>";
    ?>
</div>
<div class="custom-class1">
    <?php
    include 'pageModifiedDate.php';
    ?>
</div>

</body>
</html>

