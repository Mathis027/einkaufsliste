
<?php
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: no-reply@kraekel.com" . "\r\n" .
"Reply-To: support@kraekel.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$email = "matilolig@gmail.com";
$newpasswordToken = "e";
$link = "https://kraekel.com/reset-password?token=$newpasswordToken";
$msg = "Bitte klicke auf diesen Link um dein Passwort zurückzusetzen $link";
mail($email, "Password Reset", $msg, $headers);
$from = "From: Vorname Nachname <Mathis@kraekel.com>";
echo "email versendet";