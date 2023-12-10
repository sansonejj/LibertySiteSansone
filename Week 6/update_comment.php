<?php
include '../database/database_connection.php';
include '../authenticated.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Update Comment</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'Week 5/week5Nav.php';
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Update Comments</h1>";
    ?>
</div>

<div class="body">
    <form action="" method="post">
        <?php
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $comment_id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $title = $_POST['title'];
            $comments = $_POST['comments'];

            // Reference for prepared statements to help address sql injection: https://stackoverflow.com/questions/18426172/what-does-bind-param-accomplish
            $stmt = $conn->prepare("UPDATE Comments SET name = ?, title = ?, comments = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $title, $comments, $comment_id);

            if($stmt->execute()) {
              header("Location: comment_management.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $stmt->close();
        } else {

        $result = $conn->query("SELECT name, title, comments FROM Comments WHERE id = $comment_id");

        if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo ($row['name']); ?>"><br>

        <label for="title">Title:</label><br>
        <input type="text" name="title" value="<?php echo ($row['title']); ?>"><br>

        <label for="comments">Comments:</label><br>
        <textarea name="comments"><?php echo ($row['comments']); ?></textarea><br>

        <input type="submit" value="Update Comment">
    </form>
    <?php
    } else {
        echo "Comment not found.";
    }
    }
    } else {
        echo "Invalid request, please try again";
    }

    $conn->close();
    ?>
</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>
<?php
include '../click_logout.php'
?>
</body>
</html>
