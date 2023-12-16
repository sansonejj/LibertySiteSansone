<?php
include '../database/database_connection.php';
include '../sessions.php';
checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer

if (isset($_GET['id'])) {
    $userId = $_GET['id'];


    $sql = "SELECT * FROM site_user WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        echo "Error: " . $conn->error;
        exit;
    }
} else {
    echo "No user ID provided.";
    exit;
}


function fetchUserGroups($conn, $selectedGroupId): void {
    $sql = "SELECT id, group_name FROM user_groups";
    $result = $conn->query($sql);
    while ($group = $result->fetch_assoc()) {
        $selected = ($group['id'] == $selectedGroupId) ? 'selected' : '';
        echo "<option value=\"{$group['id']}\" $selected>{$group['group_name']}</option>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $loginId = $_POST['loginId'];
    $userPermissionGroup = $_POST['userPermissionGroup'];
    $password = $_POST['password'];


    $sql = "UPDATE site_user SET user_first_name = ?, user_last_name = ?, user_login_id = ?, user_permission_group = ?";

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ", user_password = ?";
    }

    $sql .= " WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        if (!empty($password)) {
            $stmt->bind_param("sssisi", $firstName, $lastName, $loginId, $userPermissionGroup, $hashedPassword, $userId);
        } else {
            $stmt->bind_param("sssii", $firstName, $lastName, $loginId, $userPermissionGroup, $userId);
        }

        $stmt->execute();
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <h1>Edit User</h1>
</div>


<div style="margin-left: 20px" class="table">

    <form method="post" action="">
        First name:<br>
        <input type="text" name="firstName" value="<?php echo $user['user_first_name']; ?>"><br>
        Last name:<br>
        <input type="text" name="lastName" value="<?php echo $user['user_last_name']; ?>"><br>
        Login ID:<br>
        <input type="text" name="loginId" value="<?php echo $user['user_login_id']; ?>"><br>
        New Password (optional):<br>
        <input type="password" name="password"><br>
        Permission Group:<br>
        <select name="userPermissionGroup">
            <?php fetchUserGroups($conn, $user['user_permission_group']); ?>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>
<?php include '../click_logout.php'; ?>
</body>
</html>
