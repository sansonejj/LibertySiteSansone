<?php
//include 'authenticated.php';
include 'sessions.php';
include 'database/database_connection.php'; // Make sure this path is correct
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Our Staff</title>
</head>
<body>
<div class="navigation">
    <?php include 'Week 5/week5Nav.php'; ?>

</div>

<div class="page-header">
    <h1>Sansone Liberty Staff</h1>
</div>

<div class="body">
    <?php
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<ul style="list-style: none;">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li style="display: inline-block; margin-right: 40px">';
            echo '<img src="' . htmlspecialchars($row['employee_image']) . '" alt="' . htmlspecialchars($row['employee_name']) . '" width="200" height="200" />';
            echo '<br>';

            echo '<a href="dynamic_employee_page.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['employee_name']) . '</a>';
            echo '<br>';
            echo htmlspecialchars($row['employee_job_title']);
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo "<p>No employees found.</p>";
    }
    ?>
</div>

<div class="custom-class1">
    <?php include 'siteValidation.php'; ?>
</div>

<?php include 'click_logout.php'; ?>
</body>
</html>
