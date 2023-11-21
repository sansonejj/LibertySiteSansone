<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: ../Week 4/loginForm.php'); // Redirect if not authenticated
    exit();
}

?>

<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <?php include 'variables.php' ?>
    <title><?php echo $employee2_name ?></title>
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
    echo "<h1>$employee2_name</h1>";
    ?>
</div>

<div class="body">
    <ul style="list-style: none;">
        <img src="emp_TL.jpeg" alt="<?php echo $employee2_name; ?>" width="200">
        <li>Job Title: <?php echo $employee2_job_title; ?></li>
        <li>Department: <?php echo $employee2_department; ?></li>
        <li>Favorite Book: <?php echo $employee2_favorite_book; ?></li>
        <li>Hobby: <?php echo $employee2_hobby; ?></li>
        <li>Interests: <?php echo $employee2_interests; ?></li>


    </>

</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>
<?php
include 'click_logout.php'
?>
</body>
</html>
