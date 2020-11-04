<form class="form-inline mt-2 mt-md-0" action="includes/sighup.inc.php" method="post">
    <input class="form-control mr-sm-2" type="text" name="uid" placeholder="Username" value="<?php if (isset($_GET['uid'])) echo $_GET['uid']; ?>">
    <input class="form-control mr-sm-2" type="text" name="email" placeholder="E-mail" value="<?php if (isset($_GET['email'])) echo $_GET['uid']; ?>">
    <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
    <input class="form-control mr-sm-2" type="password" name="password-check" placeholder="Repeat your password">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sighup-submit">Confirm</button>
</form>
