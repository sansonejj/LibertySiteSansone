<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

function fetchUserGroups($conn) {
    $sql = "SELECT id, group_name FROM user_groups";
    $result = mysqli_query($conn, $sql);
    //Reference Fetching: https://www.php.net/manual/en/function.mysql-fetch-field.php
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


$sql = "SELECT u.id, u.user_first_name, u.user_last_name, u.user_login_id, u.last_login, g.group_name 
        FROM site_user u 
        LEFT JOIN user_groups g ON u.user_permission_group = g.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <!-- JS toggling form function Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp -->
    <script>
        function toggleAddUserForm() {
            var form = document.getElementById("addUserForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>

</head>
<body>
<div class="navigation">
    <?php include 'admin_nav.php'; ?>
</div>

<div class="page-header">
    <h1>User Management</h1>
</div>

<div class="body_centered">
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Login ID</th><th>User Group</th><th>Last Login</th><th>Actions</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["user_first_name"]."</td>";
            echo "<td>".$row["user_last_name"]."</td>";
            echo "<td>".$row["user_login_id"]."</td>";
            echo "<td>".$row["group_name"]."</td>";
            echo "<td>".($row["last_login"] ? date("Y-m-d H:i:s", strtotime($row["last_login"])) : "Never")."</td>";
            echo "<td><a href='edit_user.php?id=".$row['id']."'>Edit</a> | <a href='delete_user.php?id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
    ?>
</div>
    <div style="margin-bottom: 20px;">
        <button onclick="toggleAddUserForm()">Add User</button>

        <div id="addUserForm" style="display:none;">
            <form method="post" action="add_user.php" class="form-row">
                <label>First Name:<input type="text" name="firstName"></label>
                <label>Last Name:<input type="text" name="lastName"></label>
                <label>Login ID:<input type="text" name="loginId"></label>
                <label>Password:<input type="password" name="password"></label>
                <label>Permission Group:
                    <select name="userPermissionGroup">
                        <?php
                        $userGroups = fetchUserGroups($conn);
                        foreach ($userGroups as $group) {
                            echo "<option value=\"{$group['id']}\">{$group['group_name']}</option>";
                        }
                        ?>
                    </select>
                </label>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>

<?php include '../click_logout.php'; ?>

</body>
</html>
