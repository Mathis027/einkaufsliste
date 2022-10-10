<?php
require "assets/includes/connect.php";
if(isset($_GET["feedback"])) {
        $empfaenger = "mathis@kraekel.com";
        $betreff = "Feedback";
        $from = "no-reply@silent-gen.com";
        $text = "Feedback: <br> " . $_GET["feedback"];

        mail($empfaenger, $betreff, $text, $from);
        echo "Email gesendet";
}