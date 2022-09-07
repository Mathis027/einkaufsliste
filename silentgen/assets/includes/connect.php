<?php

try {
    $db = new PDO("mysql:host=91.218.65.223;dbname=silentgen", "silentgen", "#757qIa2efwlkeh23234", );
    return $db;
} catch (Exception $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten!.";
}

function getDB() {
    global $db;
    return $db;
}
function showlists() {
    global $db;
    $query = $db->prepare('show tables');
    $query->execute();
    $lists = $query->fetchAll(PDO::FETCH_COLUMN);
    return $lists;
}
