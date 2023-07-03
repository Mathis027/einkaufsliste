<?php
session_start();
require "../include/connect.php";
function listeLoeschen() {

    // aus einkaufDB löschen
        $list = $_POST["liststring"];
        $listdata = geteinkaufUsersDB();
        $listdata->query("DELETE FROM listdata WHERE liststring = '$list' ");
        $einkaufdb = geteinkaufDB();
        $einkaufdb->query("DROP TABLE $list ");

        $deleteshared = $listdata->prepare("DELETE FROM listshare WHERE addeduser = :addeduser AND liststring = :liststring");
        $deleteshared->execute([
            "addeduser" => $_SESSION["id"],
            "liststring" => $list,
        ]);




    header("Location: ../../mylists.php");
        // aus UserDB löschen
}
listeLoeschen();
