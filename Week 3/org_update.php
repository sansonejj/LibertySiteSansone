<?php /** @noinspection ALL */
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
    <title>Modify Employee Details</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="/styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week3Nav.php'
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Modify Employee Details</h1>";
    ?>
</div>
<!-- Reference to build the form and array: https://stackoverflow.com/questions/5652465/php-array-and-html-form-drop-down-list
     Reference 2: https://libertyonline.vitalsource.com/reader/books/9781492054085/epubcfi/6/24%5B%3Bvnd.vst.idref%3Dchapter-idm45922791603880%5D!/4/2/2%5Barray%5D/2/3:4%5Brra%2Cys%5D-->
<div class="form body">
    <form action="update_submit.php" method="post">
        <label for="employee">Select Employee:</label>
        <select name="employee" id="employee">
            <?php
            /* Reference: https://libertyonline.vitalsource.com/reader/books/9781492054085/epubcfi/6/30%5B%3Bvnd.vst.idref%3Dchapter-idm45922770165944%5D!/4/2/2%5Bweb_techniques%5D/14/2%5Bsetting_response_headers%5D/22/2%5Bauthentication%5D/14/134 */
            include($_SERVER['DOCUMENT_ROOT'] . '/variables.php');
            // Store the employee names in an array
            $employeeNames = array(
                $employee1_name,
                $employee2_name,
                $employee3_name
            );
            // Populates the dropdown with employee names
            foreach ($employeeNames as $index => $name) {
                $employeeNumber = $index + 1;
                echo "<option value='employee$employeeNumber'>$name</option>";

            }
            ?>

        </select>
        <br>
        <!-- Reference: https://www.w3schools.com/tags/tag_label.asp -->

        <label for="job">Job Title:</label>
        <input type="text" name="job" id="job" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" id="department" required><br>

        <label for="interests">Interests:</label>
        <input type="text" name="interests" id="interests" required><br>

        <label for="hobby">Hobby:</label>
        <input type="text" name="hobby" id="hobby" required><br>

        <label for="favbook">Favorite Book:</label>
        <input type="text" name="favbook" id="favbook" required><br>

        <input type="submit" value="Update">
    </form>
</div>

<div class="custom-class1">
    <?php
    include($_SERVER['DOCUMENT_ROOT'] .  '/siteValidation.php');
    ?>
</div>

<!--  -->
</body>
</html>
