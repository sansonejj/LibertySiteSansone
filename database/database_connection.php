
<?php
//Reference: https://mediastroke.com/blog/php-mysql-connection/
//This file to be used as include statement to connect to DB throughout my site
$servername = "www.sansoneliberty.com";
$database = "jonathan_sansone";
$username = "web-admin";
$password = "#4#BXS41ndT0lAUG!rM{";

$conn = mysqli_connect($servername, $username, $password, $database);

// Connection Check
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>