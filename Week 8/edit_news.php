<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1', '2']); //1= Administrator, 2= Publisher, 3= Customer

function cleanUserInput($data) {
    //Reference: https://www.php.net/manual/en/function.trim.php
    $data = trim($data);
    //Reference: https://www.php.net/manual/en/function.stripslashes.php
    $data = stripslashes($data);
    //Reference: https://www.php.net/manual/en/function.htmlspecialchars.php
    $data = htmlspecialchars($data);
    return $data;
}


$news = null;
if (isset($_GET['id'])) {
    $newsId = intval($_GET['id']);

    $sql = "SELECT * FROM news_links WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $newsId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $news = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
}

if (!$news) {
    echo "No news link found.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $title = cleanUserInput($_POST['title']);
    $hyperlink = cleanUserInput($_POST['hyperlink']);

    $sql = "UPDATE news_links SET title = ?, hyperlink = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $title, $hyperlink, $newsId);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: news_management.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit News Link</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <h1>Edit News Link</h1>
</div>

<div class="body_centered">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $newsId); ?>">
        <label>Title:<input type="text" name="title" value="<?php echo $news['title']; ?>"></label>
        <label>Hyperlink:<input type="text" name="hyperlink" value="<?php echo $news['hyperlink']; ?>"></label>
        <input type="submit" name="update" value="Update News Link">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
