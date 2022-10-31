<?php
session_start();
require "assets/includes/connect.php";
$token = $_GET["token"];
if(!isset($_SESSION["id"])) {
    header("Location: /login.php");
}

$userid = $_SESSION["id"];
if(isset($token)) {
    $list = getListFromToken($token);
    $liststring = $list["liststring"];
    addUserToList($liststring,$userid);
    header("list/mylists.php");
}
#fewkjefb