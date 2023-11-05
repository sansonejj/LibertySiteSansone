<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <?php include 'variables.php' ?>
    <title><?php echo $employee1_name ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week1Nav.php'
    ?>


</div>

<div class="page-header">
    <?php
    echo "<h1>$employee1_name</h1>";
    ?>
</div>

<div class="body">
    <ul style="list-style: none;">
        <img src="emp_JS.webp" alt="<?php echo $employee1_name; ?>" width="300">
        <li>Job Title: <?php echo $employee1_job_title; ?></li>
        <li>Department: <?php echo $employee1_department; ?></li>
        <li>Favorite Book: <?php echo $employee1_favorite_book; ?></li>
        <li>Hobby: <?php echo $employee1_hobby; ?></li>
        <li>Interests: <?php echo $employee1_interests; ?></li>


    </>

</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>

</body>
</html>
