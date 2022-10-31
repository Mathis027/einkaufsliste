<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
    header('Location: generator.php');
    exit;
}
require "db.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="Dein Text hier rein schreiben!";>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" media="screen and (max-device-width: 768px)" href="mobilestyle.css" />
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <?php if($_GET["incorrect"] == 1) {
        echo "Username oder Passwort incorrect";
    }
    ?>
    <form action="authenticate.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Discord Name" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login">
        <p class="noregistration-sub">Noch keinen Account? <a href="register.php">Registrieren</a></p>
        <p class="noregistration-sub">Passwort vergessen? <a href="passwortvergessen.php">Hilfe</a></p>
    </form>
</div>
</body>
</html>