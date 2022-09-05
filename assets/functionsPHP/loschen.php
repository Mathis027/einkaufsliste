<?php
session_start();
require "../includes/connect.php";
function listeLoeschen() {
    $list = $_POST["liststring"];
    $einkaufdb = geteinkaufDB();
    $einkaufdb->query("DROP TABLE $list ");
    $listdata = geteinkaufUsersDB();
    $listdata->query("DELETE FROM listdata WHERE liststring = $list ");
    echo $list;
}
listeLoeschen();