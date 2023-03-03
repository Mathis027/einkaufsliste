<?php
session_start();
require_once "../include/connect.php";
require "../include/list.php";
$list = $_SESSION["list"];

function setNewAnzahl()
{
    global $einkaufdb;
    if (isset($_POST["anzahl"])) {
        $anzahl = $_POST["anzahl"];
        $id = $_POST["id"];
        global $list;
        $absenden = $einkaufdb->prepare("UPDATE $list SET `Anzahl` = :anzahl WHERE $list.`ListeID` = :id");
        $absenden->execute([
            "anzahl" => $anzahl,
            "id" => $id,
        ]);
    } else{
        echo "Ein Fehler ist aufgetreten (ChangeAnzahl.php)";
    }
}

setNewAnzahl();
echo liste($list);