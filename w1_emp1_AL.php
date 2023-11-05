<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <?php include 'variables.php' ?>
    <title><?php echo $employee3_name ?></title>
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
    echo "<h1>$employee3_name</h1>";
    ?>
</div>

<div class="body">
    <ul style="list-style: none;">
        <img src="emp_AL.jpg" alt="<?php echo $employee3_name; ?>" width="300">
        <li>Job Title: <?php echo $employee3_job_title; ?></li>
        <li>Department: <?php echo $employee3_department; ?></li>
        <li>Favorite Book: <?php echo $employee3_favorite_book; ?></li>
        <li>Hobby: <?php echo $employee3_hobby; ?></li>
        <li>Interests: <?php echo $employee3_interests; ?></li>


    </>

</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>

</body>
</html>
