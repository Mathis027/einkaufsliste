<?php
session_start();
require_once "../includes/connect.php";
require "../includes/list.php";
$markedList = $_SESSION["list"];

function setChecked(){
    global $markedList;
    global $einkaufdb;
    if(isset($_POST["checked"])) {
        $id = $_POST["checked"];
        $cchange = $einkaufdb->prepare("UPDATE $markedList SET `checked` = :checked WHERE $markedList.`ListeID` = :id");
        $cchange->execute([
            "checked" => "checked",
            "id" => $id,
        ]);

        #echo "EIntrag wurde gechecked und ID ist $id";
    } elseif(isset($_POST["notchecked"])) {
        $id = $_POST["notchecked"];
        $cchange = $einkaufdb->prepare("UPDATE $markedList SET `checked` = :checked WHERE $markedList.`ListeID` = :id");
        $cchange->execute([
            "checked" => " ",
            "id" => $id,
        ]);
        #echo "EIntrag wurde nicht gechecked!";
    }
}
setChecked();
echo liste($markedList);