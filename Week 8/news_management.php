<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1', '2']); //1= Administrator, 2= Publisher, 3= Customer
//Reference Fetching: https://www.php.net/manual/en/function.mysql-fetch-field.php
function fetchNewsLinks($conn) {
    $sql = "SELECT * FROM news_links";
    //Reference Fetching: https://www.php.net/manual/en/function.mysql-fetch-field.php
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$newsLinks = fetchNewsLinks($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage News Links</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />

    <!-- JS toggling form function Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp -->
    <script>
        function toggleAddNewsForm() {
            var form = document.getElementById("addNewsForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
<div class="navigation">
    <?php include 'admin_nav.php'; ?>
</div>

<div class="page-header">
    <h1>News Management</h1>
</div>

<div class="body_centered">
    <button onclick="toggleAddNewsForm()">Add News Link</button>
    <div id="addNewsForm" style="display:none;">
        <form method="post" action="add_news.php" class="form-row">
            <label>Title:<input type="text" name="title"></label>
            <label>Hyperlink:<input type="text" name="hyperlink"></label>
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    if (count($newsLinks) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Title</th><th>Hyperlink</th><th>Actions</th></tr>";
        foreach($newsLinks as $link) {
            echo "<tr>";
            echo "<td>".$link["id"]."</td>";
            echo "<td>".$link["title"]."</td>";
            echo "<td>".$link["hyperlink"]."</td>";
            echo "<td><a href='edit_news.php?id=".$link['id']."'>Edit</a> | <a href='delete_news.php?id=".$link['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No news links found.";
    }
    ?>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
