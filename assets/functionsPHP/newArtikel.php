<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
    require_once "../include/connect.php";
    require "../include/list.php";

        # Artikel definieren

    $artikel = $_POST["artikel"];
    $markedList = $_SESSION["list"];
    if(!empty($artikel)){
        $absenden = geteinkaufDB()->prepare("INSERT INTO $markedList (Name, userid, checked, Anzahl) VALUES (:name, :userid, :checked, :anzahl)");
        $absenden->execute([
            "name" => $artikel,
            "userid" => $_SESSION["id"],
            "checked" => "",
            "anzahl" => 1,
        ]);

        echo liste($markedList);
        # Nachdem es abgeschickt wurde
    } else {
        echo liste($markedList);
    }
    ?>
