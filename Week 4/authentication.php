<?php
session_start();
include '../database/database_connection.php';
//References: https://www.php.net/manual/en/mysqli.real-escape-string.php
//https://www.w3schools.com/php/php_mysql_prepared_statements.asp
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_execute.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_bind_result.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_fetch.htm
//https://www.tutorialspoint.com/php/php_function_mysqli_stmt_close.htm
//https://www.tutorialspoint.com/php/php_function_password_verify.htm
//https://stackoverflow.com/questions/22965067/when-and-why-i-should-use-session-regenerate-id (For additional securing of the database)


if (isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];


    $sql = "SELECT user_password FROM site_user WHERE user_login_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashedPassword);

        if (mysqli_stmt_fetch($stmt)) {
            mysqli_stmt_close($stmt);


            if (password_verify($password, $hashedPassword)) {
                session_regenerate_id(true);


                $updateSql = "UPDATE site_user SET last_login = NOW() WHERE user_login_id = ?";
                if ($updateStmt = mysqli_prepare($conn, $updateSql)) {
                    mysqli_stmt_bind_param($updateStmt, "s", $username);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);
                }


                $sqlGroup = "SELECT user_permission_group FROM site_user WHERE user_login_id = ?";
                if ($stmtGroup = mysqli_prepare($conn, $sqlGroup)) {
                    mysqli_stmt_bind_param($stmtGroup, "s", $username);
                    mysqli_stmt_execute($stmtGroup);
                    mysqli_stmt_bind_result($stmtGroup, $userGroup);
                    mysqli_stmt_fetch($stmtGroup);
                    mysqli_stmt_close($stmtGroup);

                    $_SESSION['authenticated'] = true;
                    $_SESSION['user_group'] = $userGroup;


                    if (isset($_SESSION['redirect_url'])) {
                        $redirect_url = $_SESSION['redirect_url'];
                        unset($_SESSION['redirect_url']);
                        header('Location: ' . $redirect_url);
                        exit();
                    } else {
                        header('Location: /w1_AboutUs.php');
                        exit();
                    }
                }
            } else {

                header('Location: /Week 4/loginForm.php');
                exit();
            }
        } else {
            mysqli_stmt_close($stmt);

            header('Location: /Week 4/loginForm.php');
            exit();
        }
    }

    echo "Error: " . mysqli_error($conn);
    exit();
}

header('Location: /Week 4/loginForm.php');
exit();
?>
