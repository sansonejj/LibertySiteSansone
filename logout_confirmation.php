<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Logout Confirmation</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week1Nav.php'
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Logout Confirmation</h1>";
    ?>
</div>

<div class="body">
    <?php
    echo "<p>You have successfully been logged out. To login again, please complete the information below.</p>";
    ?>
    <div class="body">

        <form action="Week 4/verifyLogin.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>

<!--  -->
</body>
</html>
