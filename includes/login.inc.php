<?php

if (isset($_POST['login-submit'])) {
    require 'db.inc.php';

    $uid = $_POST['emailuid'];
    $password = $_POST['password'];

    if (empty($uid) && empty($password)) {
        header('Location: ../index.php?error=empty_fields');
        exit();
    } else {
        $sql = 'SELECT * FROM users WHERE username=? OR email=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../index.php?error=sql_error_init');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $uid, $uid);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)) {
                $password_check = password_verify($password, $row['password']);
                if ($password_check == false) {
                    header('Location: ../index.php?error=wrong_password');
                    exit();
                } elseif ($password_check == true) {
                    session_start();
                    $_SESSION['uid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    header('Location: ../index.php?login=success');
                    exit();
                }
            } else {
                header('Location: ../index.php?error=uid_does_not_exist');
                exit();
            }
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}
