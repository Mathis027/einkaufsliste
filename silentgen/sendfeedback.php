<?php
require "assets/includes/connect.php";
if(isset($_POST["feedback"])) {
    $feedback = getDB()->query("SELECT * FROM feedback");
    $fed = $feedback->fetch();
    $feed = $_POST["feedback"];
    echo $fed[$feed];
    $new = $fed[$feed] + 1;
    echo $new;
    $newfeedback = getDB()->prepare("UPDATE feedback SET $fed[$feed] = :new WHERE feedback = `feedback` ");
    $smt = $newfeedback->execute([
        "feed" => $fed[$feed],
        "new" => $new,
    ]);

}