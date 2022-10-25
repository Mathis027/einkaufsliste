<?php
if(isset($_POST["feedback"]) and $_POST["token"] == "hfuiewhiuh29834zthuerfn34985uhrtg") {
        $empfaenger = "mathis@kraekel.com";
        $betreff = "Feedback";
        $from = "no-reply@silent-gen.com";
        $text = "Feedback: <br> " . $_GET["feedback"];

        mail($empfaenger, $betreff, $text);
        echo "Email gesendet";
        header("Location: https://accounts.silent-gen.com/generated.php");
} else {
}
