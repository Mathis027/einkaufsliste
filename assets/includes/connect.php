<?php
#Datenbankverbindung herstellen
try {
    $einkaufdb = new PDO('mysql:host=91.218.65.223;dbname=einkauf', 'einkauf', 'einkauf1234');
} catch(PDOException $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten: " . $e;
}
try {
    $einkaufUsersDB = new PDO('mysql:host=91.218.65.223;dbname=users-einkaufsliste', 'users-einkaufsliste', '0wd3@k84V');
} catch(PDOException $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten: " . $e;
}

# Artikel hinzufügen 
function geteinkaufDB(){
    global $einkaufdb;
    return $einkaufdb;
}
function geteinkaufUsersDB() {
    global $einkaufUsersDB;
    return $einkaufUsersDB;
}
    # Liste leeren