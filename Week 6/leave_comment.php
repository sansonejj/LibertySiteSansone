<?php
include '../database/database_connection.php';

//Reference: https://www.php.net/manual/en/mysqli.real-escape-string.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['comments'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);
    $commentdate = date('Y-m-d H:i:s');


    $insert_sql = "INSERT INTO Comments (name, title, comments, commentdate) VALUES ('$name', '$title', '$comments', '$commentdate')";

    // Reference: https://www.php.net/manual/en/reserved.variables.server.php
    if (mysqli_query($conn, $insert_sql)) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Leave A Comment</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include '../Week 5/week5Nav.php';
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Leave Us A Comment!</h1>";
    ?>
</div>

<div class="body" align="center">
    <form method="post" action="<?php echo  ($_SERVER["PHP_SELF"]);?>" onsubmit="return confirmSubmit()">
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="title">Title:</label></td>
                <td><input type="text" id="title" name="title" required></td>
            </tr>
            <tr>
                <td><label for="comments">Comment:</label></td>
                <td><textarea id="comments" name="comments" required cols="" rows=""></textarea></td>
            </tr>
        </table>
        <input type="submit" value="Submit">
    </form>
</div>
<script>
    /* Reference: https://www.w3schools.com/js/js_popup.asp */
    function confirmSubmit() {
        alert('Thank you for taking the time to leave a comment. Your comment is live on our website!');
        return true;
    }
</script>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

<!--  -->
</body>
</html>


