<?php
//include 'authenticated.php';
//include 'sessions.php';
include 'database/database_connection.php';


$employeeId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$employeeId) {
    echo "No employee ID provided.";
    exit;
}

$sql = "SELECT * FROM employee WHERE id = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    //Reference: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    mysqli_stmt_bind_param($stmt, "i", $employeeId);

    //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //Reference: https://www.php.net/manual/en/function.mysql-fetch-field.php
    $employee = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$employee) {
        echo "Employee not found.";
        exit;
    }
} else {
    echo "Unable to get employee details.";
    exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title><?php echo htmlspecialchars($employee['employee_name']); ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<div class="navigation">
    <?php include 'Week 5/week5Nav.php'; ?>

</div>

<div class="page-header">
    <h1><?php echo htmlspecialchars($employee['employee_name']); ?></h1>
</div>

<div class="body">
    <ul style="list-style: none;">
        <img src="<?php echo htmlspecialchars($employee['employee_image']); ?>" alt="<?php echo htmlspecialchars($employee['employee_name']); ?>" width="300">
        <li>Job Title: <?php echo htmlspecialchars($employee['employee_job_title']); ?></li>
        <li>Department: <?php echo htmlspecialchars($employee['employee_department']); ?></li>
        <li>Favorite Book: <?php echo htmlspecialchars($employee['employee_favorite_book']); ?></li>
        <li>Hobby: <?php echo htmlspecialchars($employee['employee_hobby']); ?></li>
        <li>Interests: <?php echo htmlspecialchars($employee['employee_interests']); ?></li>
    </ul>
</div>

<div class="custom-class1">
    <?php include 'siteValidation.php'; ?>
</div>

<?php include 'click_logout.php'; ?>
</body>
</html>
