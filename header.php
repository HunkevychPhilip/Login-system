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


        <header class="black" style="background-color: yellow;">
            <nav>
                <a href="index.php">Home</a>
            </nav>

            <div class="container text-center">
                Header yellow
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="emailuid" placeholder="E-mail or username">
                    <br>
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="sighup.php">Sign up</a>
                <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </header>
