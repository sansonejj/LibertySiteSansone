<?php
include '../database/database_connection.php';
?>
<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Insert Title Here</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css" />

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
            // Form has been submitted, process the update
            $name = $_POST['name'];
            $title = $_POST['title'];
            $comments = $_POST['comments'];

            // Prepare the SQL statement to prevent SQL injection
            $stmt = $conn->prepare("UPDATE Comments SET name = ?, title = ?, comments = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $title, $comments, $comment_id);

            // Execute the statement
            if($stmt->execute()) {
                // Redirect to the comments page or a confirmation page
                header("Location: view_comments.php"); // Adjust the redirection as per your file structure
            } else {
                echo "Error updating record: " . $conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
        // Form has not been submitted, display existing data
        $result = $conn->query("SELECT name, title, comments FROM Comments WHERE id = $comment_id");

        if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"><br>

        <label for="title">Title:</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"><br>

        <label for="comments">Comments:</label><br>
        <textarea name="comments"><?php echo htmlspecialchars($row['comments']); ?></textarea><br>

        <input type="submit" value="Update Comment">
    </form>
    <?php
    } else {
        echo "No comment found with that ID.";
    }
    }
    } else {
        echo "Invalid request";
    }

    $conn->close();
    ?>
    <?php
    //This is where the body or text content will go
    echo "<p></p>";
    ?>
</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>

<!--  -->
</body>
</html>
