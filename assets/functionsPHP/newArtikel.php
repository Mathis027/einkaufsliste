<?php
    require_once "../includes/connect.php";
    require "../includes/list.php";

        # Artikel definieren

    $artikel = $_POST["artikel"];

    if(!empty($artikel)){
        $absenden = geteinkaufDB()->prepare("INSERT INTO einkauf (Name) VALUES (:name)");
        $absenden->bindParam(":name", $artikel);
        $absenden->execute();

        echo liste();
        # Nachdem es abgeschickt wurde
    } else {
        echo liste();
    }
    ?>
