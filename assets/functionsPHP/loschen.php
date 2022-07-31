<?php
session_start();
require "../includes/connect.php";
$list = $_POST["list"];
function listeLoeschen() {
    global $list;
    global $einkaufdb;
    $einkaufdb->query("DROP TABLE $list");
    header("Location: /list/mylists.php");
}
listeLoeschen();