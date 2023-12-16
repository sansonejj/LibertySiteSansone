<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

function cleanUserInput($data) {
    //Reference: https://www.php.net/manual/en/function.trim.php
    $data = trim($data);
    //Reference: https://www.php.net/manual/en/function.stripslashes.php
    $data = stripslashes($data);
    //Reference: https://www.php.net/manual/en/function.htmlspecialchars.php
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $name = $_POST['name'];
    $webpage = $_POST['webpage'];
    $image = $_POST['image'];
    $jobTitle = $_POST['jobTitle'];
    $department = $_POST['department'];
    $favoriteBook = $_POST['favoriteBook'];
    $hobby = $_POST['hobby'];
    $interests = $_POST['interests'];



    $sql = "UPDATE employee SET employee_name = ?, employee_job_title = ?, employee_department = ? WHERE id = ?";
    //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssi", $employeeName, $jobTitle, $department, $employeeId);
        //Reference: https://www.php.net/manual/en/mysqli-stmt.execute.php
        if (mysqli_stmt_execute($stmt)) {
            header("Location: employee_management.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


$employee = null;
if (isset($_GET['id'])) {
    $employeeId = intval($_GET['id']);

    $sql = "SELECT * FROM employee WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $employeeId);
        mysqli_stmt_execute($stmt);


        //Reference: https://www.php.net/manual/en/mysqli-stmt.get-result.php
        $result = mysqli_stmt_get_result($stmt);

        //Reference:https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
        $employee = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
}

if (!$employee) {
    echo "No employee found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <h1>Edit Employee</h1>
</div>

<div class="body_centered">
    <form method="post" action="edit_employee.php">
        <input type="hidden" name="employeeId" value="<?php echo $employee['id']; ?>">
        <label>Name:<input type="text" name="employeeName" value="<?php echo $employee['employee_name']; ?>"></label>
        <label>Job Title:<input type="text" name="jobTitle" value="<?php echo $employee['employee_job_title']; ?>"></label>
        <label>Department:<input type="text" name="department" value="<?php echo $employee['employee_department']; ?>"></label>
        <input type="submit" name="update" value="Update Employee">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
