<?php
require_once "../includes/connect.php";
require "../includes/list.php";
function setChecked(){
    global $einkaufdb;
    if(isset($_POST["checked"])) {
        $id = $_POST["checked"];
        $cchange = $einkaufdb->prepare("UPDATE `einkauf` SET `checked` = :checked WHERE `einkauf`.`ListeID` = :id");
        $cchange->execute([
            "checked" => "checked",
            "id" => $id,
        ]);
        $setTimeChecked = $einkaufdb->prepare("UPDATE `einkauf` SET `time` = :time WHERE `einkauf`.`ListeID` = :id");
        $setTimeChecked->execute([
            "id" => $id,
            "time" => "30",
        ]);
        #echo "EIntrag wurde gechecked und ID ist $id";
    } elseif(isset($_POST["notchecked"])) {
        $id = $_POST["notchecked"];
        $cchange = $einkaufdb->prepare("UPDATE `einkauf` SET `checked` = :checked WHERE `einkauf`.`ListeID` = :id");
        $cchange->execute([
            "checked" => " ",
            "id" => $id,
        ]);
        #echo "EIntrag wurde nicht gechecked!";
    }
}
setChecked();
echo liste();