<?php
session_start();
require "./assets/include/connect.php";
function listeLeeren() {
        $list = $_SESSION["list"];
        global $einkaufdb;
        $einkaufdb->query("DELETE FROM $list");
        header("Location: ./index.php");
}
listeLeeren();