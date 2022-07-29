<?php
require "../../assets/includes/connect.php";
session_start();
function createNewList($table_name)
{
    $id = strval($_SESSION["id"]);
    $table = $table_name . "I" . "$id";
    $getListDatabase = geteinkaufDB();
    $getListDatabase->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
    $sql = "CREATE table $table(
        ListeID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
        userid INT( 11 ) NOT NULL, 
        checked VARCHAR( 250 ) NOT NULL,
       Name VARCHAR( 100 ) NOT NULL, 
        Anzahl VARCHAR( 150 ) NOT NULL)";
    $getListDatabase->exec($sql);
}
$table_name = $_POST["newListName"];
if($table_name !== "") {
    createNewList($table_name);
}else {
    exit;
}