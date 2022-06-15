<?php

require_once "../includes/connect.php";
require "../includes/list.php";
function setNewAnzahl()
{
    global $einkaufdb;
    if (isset($_POST["anzahl"])) {
        $anzahl = $_POST["anzahl"];
        $id = $_POST["id"];
        $absenden = $einkaufdb->prepare("UPDATE `einkauf` SET `Anzahl` = :anzahl WHERE `einkauf`.`ListeID` = :id");
        $absenden->execute([
            "anzahl" => $anzahl,
            "id" => $id,
        ]);
    } else{
        echo "Ein Fehler ist aufgetreten (ChangeAnzahl.php)";
        var_dump($_POST["anzahl"]);
        var_dump($_POST["id"]);
    }
}

setNewAnzahl();
echo liste();