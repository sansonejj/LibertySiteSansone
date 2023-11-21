<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    //Reference for header: https://libertyonline.vitalsource.com/reader/books/9781492054085/epubcfi/6/30%5B%3Bvnd.vst.idref%3Dchapter-idm45922770165944%5D!/4/2/2%5Bweb_techniques%5D/14/2%5Bsetting_response_headers%5D/16/2%5Bdifferent_content_types%5D/4/9:39%5Be%20a%2Cs%20p%5D
    header('Location: Week 4/loginForm.php'); // Redirect if not authenticated
    exit();
}
?>

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
<?php
include 'click_logout.php'
?>
</body>
</html>
