<?php include '../database/database_connection.php';
      //include '../authenticated.php';
include '../sessions.php';
checkUserGroup(['1', '2']); //1= Administrator, 2= Publisher, 3= Customer

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Manage Comments</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>

<div class="navigation">
    <?php include '../Week 8/admin_nav.php'; ?>
</div>

<div class="page-header">
    <?php echo "<h1>Comment Management</h1>"; ?>
</div>

<div class="body_centered">
    <?php
    //Reference: https://www.w3schools.com/php/php_mysql_select.asp
    $sql = "SELECT id, name, title, comments, commentdate FROM Comments ORDER BY commentdate DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Title</th><th>Comments</th><th>Date and Time</th><th>Actions</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . ($row["name"]) . "</td>";
            echo "<td>" . ($row["title"]) . "</td>";
            echo "<td>" . ($row["comments"]) . "</td>";
            echo "<td>" . ($row["commentdate"]) . "</td>";
            echo "<td>";
            echo "<a href='delete_comment.php?id=".$row['id']."'>Delete</a> | ";
            echo "<a href='update_comment.php?id=".$row['id']."'>Update</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Be the first to leave a comment on SansoneLiberty.com!";
    }

    $conn->close();
    ?>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>
<?php
include '../click_logout.php'
?>
</body>
</html>
