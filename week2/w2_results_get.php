<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<!-- Reference: Tatroe, K., & MacIntyre, P. (2020). Programming PHP (4th ed.). O'Reilly Media, Inc.
https://libertyonline.vitalsource.com/books/9781492054085 Chapter 8-->
<head>
    <title>Results - GET Method</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week2Nav.php'
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Results (Get)</h1>";
    ?>
</div>

<div class="body">
    <table border="1" align="center">
        <tr>
            <th>Name</th>
            <th>GoldElite Radio Dispatch</th>
            <th>L3 Harris Radio Console</th>
            <th>Motorola APX6000</th>
        </tr>
        <!-- Reference: https://www.w3schools.com/php/php_forms.asp -->
        <tr>
            <td><?php echo $_GET['name']; ?></td>
            <td><?php echo $_GET['item1rating']; ?></td>
            <td><?php echo $_GET['item2rating']; ?></td>
            <td><?php echo $_GET['item3rating']; ?></td>
        </tr>

        <tr>
            <td>Comments:</td>
            <td><?php echo $_GET['item1comments']; ?></td>
            <td><?php echo $_GET['item2comments']; ?></td>
            <td><?php echo $_GET['item3comments']; ?></td>
        </tr>
    </table>
</div>

<div class="custom-class1">
    <!-- Reference: https://www.php.net/manual/en/function.include.php used for locating file in another directory -->
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>
