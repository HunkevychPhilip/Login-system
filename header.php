<?php
    session_start();
?>
<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>

        <header>
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <!--  fixed-top-->
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <?php if (!isset($_SESSION['username'])): ?>
                                    <?= '<a class="nav-link active" href="index.php?sighup_form=true">Sign up</a>' ?>
                                <?php else: ?>
                                    <?= '<a class="nav-link disabled" href="#">Sign up</a>' ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <!-- Login form-->
                        <?php if (!isset($_SESSION['username']) && $_GET['sighup_form'] == true): ?>
                            <?php include 'includes/form/sighup.html'; ?>
                        <?php elseif (!isset($_SESSION['username']) && $_GET['sighup_success'] == true): ?>
                            <?php include 'includes/form/login.html'; ?>
                        <?php elseif (!isset($_SESSION['username'])): ?>
                            <?php include 'includes/form/login.html'; ?>
                        <?php else: ?>
                            <?php include 'includes/form/logout.html'; ?>
                        <?php endif; ?>
                        <!-- /Login form-->


                    </div>
                </nav>
            </div>
        </header>
