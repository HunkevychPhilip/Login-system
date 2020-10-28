<?php

if (isset($_POST['sighup-submit'])) {
    require 'db.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_check = $_POST['password-check'];

    $password_pattern = '^(?=.*\d).{4,8}$';
    $username_pattern = '/^[a-zA-Z0-9]*$/';

    if (empty($username) || empty($email) || empty($password) || empty($password_check)) {
        header("Location: ../index.php?sighup_form=true&error=empty_fields&uid=$username&email=$email");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match($username_pattern, $username)) {
        header("Location: ../index.php?sighup_form=true&error=invalid_email_uid");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?sighup_form=true&error=invalid_email&uid=$username");
        exit();
    } elseif (!preg_match($username_pattern, $username)) {
        header("Location: ../index.php?sighup_form=true&error=invalid_uid&email=$email");
        exit();
    } elseif ($password !== $password_check) {
        header("Location: ../index.php?sighup_form=true&error=password_check&uid=$username&email=$email");
        exit();
    } else {
        $sql = 'SELECT username FROM users WHERE username=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?sighup_form=true&error=sql_error_init");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_store_result($stmt);
            $rows_count  = mysqli_stmt_num_rows($stmt);
            if ($rows_count > 0) {
                header("Location: ../index.php?sighup_form=true&error=uid_exists");
                exit();
            } else {
                $sql ='INSERT INTO users (username, email, password) VALUES (?, ?, ?);';
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?sighup_form=true&error=sql_error_second");
                    exit();
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?sighup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
    exit();
}
