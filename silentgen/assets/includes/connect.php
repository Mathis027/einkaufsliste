<?php

try {
    $db = new PDO("localhost", "admin", "admin",);
    return $db;
} catch (Exception $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten!.";
}