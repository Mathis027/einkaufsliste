<?php
session_start();
require "../../assets/includes/connect.php";

if(isset($_GET["send-reset-token"])) {
    $email = $_SESSION["email"];
    $einkaufUsersDB = geteinkaufUsersDB();
    $newpasswordToken = random_bytes(25);
    $stmt = $einkaufUsersDB->prepare("UPDATE users SET passwordToken = :newpasswordToken WHERE email = :email ");
    $stmt->execute([
        "newpasswordToken" => $newpasswordToken,
        "email" => $email,
    ]);
    $link = "https://kraekel.com/reset-password?token=$newpasswordToken";
    $msg = "Bitte klicke auf diesen Link um dein Passwort zurückzusetzen $link";
    mail($email, "Password Reset", $msg,);
}