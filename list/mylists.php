<?php

session_start();
if(!isset($_SESSION["id"])) {
    header("Location: /login.php");
}
require "../assets/includes/css.php";
require "../assets/includes/connect.php";
require "../assets/header/navbar.php";
require "../assets/includes/myAllLists.php";

if(isset($_POST["newlistname"])) {
    $table_name = $_POST["newlistname"];
    createNewList($table_name);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Einkaufsliste by MATX</title>
</head>
<body>
<div class="container">
            <div class="col-12 text-center">
                <br>
                <h1>Meine Listen</h1>
            </div>

            <?php
            $user = getUserData($_SESSION["id"]);

            if ($user["id"] !== 0){?>
            <?php }; ?>
            <div id="relAllLists">
                <?php
                echo listAllLists();
                ?>
            </div>
<script src="../assets/js/scripts.js">
</script>