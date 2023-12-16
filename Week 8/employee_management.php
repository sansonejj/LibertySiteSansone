<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

function fetchEmployees($conn) {
    //https://www.php.net/manual/en/function.mysql-fetch-field.php
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$employees = fetchEmployees($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Employees</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script>
        /*Javascript get Element ID: https://www.w3schools.com/jsref/met_document_getelementbyid.asp */
        function toggleAddEmployeeForm() {
            var form = document.getElementById("addEmployeeForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
<div class="navigation">
    <?php include 'admin_nav.php'; ?>

</div>

<div class="page-header">
    <h1>Employee Management</h1>
</div>

<div class="body_centered">
    <?php
    if (count($employees) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Webpage</th><th>Image</th><th>Job Title</th><th>Department</th><th>Favorite Book</th><th>Hobby</th><th>Interests</th><th>Actions</th></tr>";
        foreach($employees as $employee) {
            echo "<tr>";
            echo "<td>".$employee["id"]."</td>";
            echo "<td>".$employee["employee_name"]."</td>";
            echo "<td>".$employee["employee_webpage"]."</td>";
            echo "<td>".$employee["employee_image"]."</td>";
            echo "<td>".$employee["employee_job_title"]."</td>";
            echo "<td>".$employee["employee_department"]."</td>";
            echo "<td>".$employee["employee_favorite_book"]."</td>";
            echo "<td>".$employee["employee_hobby"]."</td>";
            echo "<td>".$employee["employee_interests"]."</td>";
            echo "<td><a href='edit_employee.php?id=".$employee['id']."'>Edit</a> | <a href='delete_employee.php?id=".$employee['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No employees found.";
    }
    ?>
</div>
    <div style="margin-bottom: 20px;">
        <button onclick="toggleAddEmployeeForm()">Add Employee</button>
        <div id="addEmployeeForm" style="display:none;">
            <form method="post" action="add_employee.php" class="form-row">
                <label>Name:<input type="text" name="employeeName"></label>
                <label>Job Title:<input type="text" name="jobTitle"></label>
                <label>Department:<input type="text" name="department"></label>
                <label>Favorite Book:<input type="text" name="favoriteBook"></label>
                <label>Hobby:<input type="text" name="hobby"></label>
                <label>Interests:<textarea name="interests"></textarea></label>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>


<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
