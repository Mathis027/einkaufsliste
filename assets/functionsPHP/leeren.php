<?php
require "../includes/connect.php";
function listeLeeren() {
        global $einkaufdb;
        $einkaufdb->query("DELETE FROM einkauf");
        header("Location: /index.php");
}
listeLeeren();