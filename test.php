<?php
include 'database/database_connection.php';

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    $delete_sql = "DELETE FROM Comments WHERE id = '$delete_id'";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Handle Comment Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    // Collect post data
    // ... [Rest of your submission code] ...
}

$query = "SELECT * FROM Comments";
$result = mysqli_query($conn, $query);
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Site Comments</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <!-- ... [Rest of your head section] ... -->
    </head>
    <body>

    <!-- ... [Rest of your body up to the comments-container] ... -->

    <div class="comments-container">
<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Delete</th><th>Name</th><th>Title</th><th>Comments</th><th>Date</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>
                    <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                        <input type='submit' value='Delete'>
                    </form>
                  </td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['comments']) . "</td>";
        echo "<td>" . htmlspecialchars($row['commentdate']) . "</td>";}}

