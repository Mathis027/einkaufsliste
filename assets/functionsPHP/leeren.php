<?php
session_start();
require "../includes/connect.php";
function listeLeeren() {
        $list = $_SESSION["list"];
        global $einkaufdb;
        $einkaufdb->query("DELETE FROM $list");
        header("Location: /generator.php");
}
listeLeeren();