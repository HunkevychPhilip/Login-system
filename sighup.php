<?php require 'header.php'?>

    <main>
        <div class="container text-center">
            <h1>Sign up</h1>
            <form action="includes/sighup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username" value="<?= $_GET['uid']; ?>">
                <br>
                <input type="text" name="email" placeholder="E-mail" value="<?= $_GET['email']; ?>">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="password" name="password-check" placeholder="Repeat your password">
                <br>
                <button type="submit" name="sighup-submit">Confirm</button>
            </form>
        </div>
    </main>

<?php require 'footer.php'?>