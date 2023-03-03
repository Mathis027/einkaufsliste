<?php
require "../include/connect.php";
session_start();
function createNewList($table_name)
{
    $id = strval($_SESSION["id"]);
    ## Liste in listdata eintragen

    $liste = random_string();
    ## prüfen ob Listen String schon da ist

    $getListDatabase = geteinkaufDB();
    $listtable = geteinkaufUsersDB();

        $allstrings = $listtable->prepare("SELECT * FROM listdata WHERE liststring = :liste");
        $allstrings->execute([
            "liste" => $liste,
        ]);
        $string = $allstrings->fetch();
        if($string !== FALSE) {
            echo "Fehler";
        } else {
            $stm = $listtable->prepare("INSERT INTO listdata (userid,listname, liststring, listdesc) VALUES (:userid, :listname, :liststring, :listdesc)");
            $stm->execute([
                "userid" => $id,
                "listname" => $table_name,
                "liststring" => $liste,
                "listdesc" => "test",
            ]);
            ## Liste als Liste anlegen

            $getListDatabase->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            $sql = "CREATE table $liste(
                        ListeID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                        userid INT( 11 ) NOT NULL,
                        checked VARCHAR( 250 ) NOT NULL,
                       Name VARCHAR( 100 ) NOT NULL,
                        Anzahl VARCHAR( 150 ) NOT NULL)";
            $getListDatabase->exec($sql);
        }
    }
$table_name = $_POST["newListName"];
if($table_name !== "") {
    createNewList($table_name);
}else {
    exit;
}