
<?php
$empfaenger = "matilolig@gmail.com";
$betreff = "Die Mail-Funktion";
$from = "From: Vorname Nachname <Mathis@kraekel.com>";
$text = "Hier lernt Ihr, wie man mit PHP Mails verschickt";

mail($empfaenger, $betreff, $text, $from);
?>

