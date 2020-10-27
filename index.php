<?php require 'header.php'?>

    <main>
        <div class="container text-center">
            <?php
            $message = '';
            if (isset($_SESSION['username'])) {
                $message = 'You are logged in.';
            } else {
                $message = 'You are logged out.';
            }
            ?>

            <p><?= $message ?></p>
        </div>
    </main>

<?php require 'footer.php'?>
