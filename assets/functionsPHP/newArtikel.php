<?php
session_start();
    require_once "../includes/connect.php";
    require "../includes/list.php";

        # Artikel definieren

    $artikel = $_POST["artikel"];
    $markedList = $_SESSION["list"];
    if(!empty($artikel)){
        $absenden = geteinkaufDB()->prepare("INSERT INTO $markedList (Name) VALUES (:name)");
        $absenden->execute([
            "name" => $artikel,
        ]);

        echo liste($markedList);
        # Nachdem es abgeschickt wurde
    } else {
        echo liste($markedList);
    }
    ?>
