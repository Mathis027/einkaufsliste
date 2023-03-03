<?php
session_start();
require "./assets/include/connect.php";
$token = $_GET["token"];
if(!isset($_SESSION["id"])) {
    header("Location: ./login.php");
}

$userid = $_SESSION["id"];
if(isset($token)) {
    $list = getListFromToken($token);
    $liststring = $list["liststring"];
    $isadded = isListatUser($liststring, $userid);
    if(!$isadded) {
        addUserToList($liststring,$userid);
        echo "Du bist erfolgreich dieser Liste beigetreten";
    } else {
        echo "Du bist bereits zu dieser Liste hinzugefügt";
    }
    //header("Location: /list/mylists.php");
}
