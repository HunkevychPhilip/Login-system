<?php require 'header.php'?>

<main class="container mt-5 pt-3 text-center">

    <div class="text-center">
        <?php
        $message = '';
        if (isset($_SESSION['username'])) {
            $message = 'You are logged in.';
        } else {
            $message = 'You are logged out.';
        }
        ?>
        <p><?= $message ?></p>

        <?php
        if ($_GET['error']) {
            if ($_GET['error'] == 'empty_fields') {
                echo '<p style="color: red;">Fields.</p>';
            } elseif ($_GET['error'] == 'invalid_email_uid') {
                echo '<p style="color: red;">Email and username.</p>';
            } elseif ($_GET['error'] == 'invalid_email') {
                echo '<p style="color: red;">Email.</p>';
            } elseif ($_GET['error'] == 'invalid_uid') {
                echo '<p style="color: red;">Username.</p>';
            } elseif ($_GET['error'] == 'password_check') {
                echo '<p style="color: red;">Passwords.</p>';
            } elseif ($_GET['error'] == 'sql_error_init') {
                echo '<p style="color: red;">Sql stmt error (SELECT username FROM users WHERE username=\'yourUsername\'.</p>';
            } elseif ($_GET['error'] == 'uid_exists') {
                echo '<p style="color: red;">Username already taken.</p>';
            } elseif ($_GET['error'] == 'sql_error_second') {
                echo '<p style="color: red;">Sql stmt error (INSERT INTO users (username, email, password) VALUES (?, ?, ?);.</p>';
            } elseif ($_GET['error'] == 'wrong_password') {
                echo '<p style="color: red;">Wrong password.</p>';
            }elseif ($_GET['error'] == 'uid_does_not_exist') {
                echo '<p style="color: red;">There is no such email or username.</p>';
            }
        } elseif ($_GET['sighup'] == 'success') {
            echo '<p style="color: green;">Sighup successful!</p>';
        }
        ?>

    </div>
</main>

<?php require 'footer.php'?>
