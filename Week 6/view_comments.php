<?php include '../database/database_connection.php' ?>

<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Comments</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>View Comments</h1>";
    ?>
</div>

<div class="body_centered">
    <?php
    //Reference: https://stackoverflow.com/questions/28601768/html-mysql-echo-query-results-into-table
    $sql = "SELECT name, title, comments, commentdate FROM Comments ORDER BY commentdate DESC ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Title</th><th>Comments</th><th>Date and Time</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["comments"] . "</td>";
            echo "<td>" . $row["commentdate"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Be the first to leave a comment!";
    }

    $conn->close();
    ?>


</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>


</body>
</html>
