<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Sansone Liberty</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'mainMenu.php';
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Welcome to SansoneLiberty.com</h1>";
    ?>
</div>

<div class="body">
    <?php
      echo "<p>Created by J.S CSIS410 at Liberty University Fall 2023 </p>";
    ?>
</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>



<!--  -->
</body>
</html>
