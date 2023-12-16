<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div class="navigation">
    <?php include '../Week 5/week5Nav.php'; ?>
</div>

<div class="page-header">
    <h1>Please Sign In to Continue</h1>
</div>

<div class="body">
    <form action="/Week%204/authentication.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</div>

<div class="custom-class1">
    <?php include '../siteValidation.php'; ?>
</div>
</body>
</html>
