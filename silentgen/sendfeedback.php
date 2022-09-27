<?php
require "assets/includes/connect.php";
if(isset($_POST["feedback"])) {
        $empfaenger = "mathis@kraekel.com";
        $betreff = "Feedback";
        $from = "no-reply@silent-gen.com";
        $text = "Feedback: <br> " . $_POST["feedback"];

        mail($empfaenger, $betreff, $text, $from);
}