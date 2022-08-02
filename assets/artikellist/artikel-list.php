<?php
require "../includes/connect.php";

$allartikel = geteinkaufDB()->query("SELECT * FROM Einkaufsliste_92");

foreach ($allartikel as $item) {
    echo $item["Name"] . "<br>";
    file_put_contents("artikel-list.txt", $item );

}