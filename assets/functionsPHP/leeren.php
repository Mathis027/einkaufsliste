<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "../include/connect.php";
function listeLeeren() {
        $list = $_SESSION["list"];
        global $einkaufdb;
        $einkaufdb->query("DELETE FROM $list");
        header("Location: ../../index.php");
}
listeLeeren();
