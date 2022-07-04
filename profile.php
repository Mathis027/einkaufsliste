<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: ../index.php");
}
require "assets/header/navbar.php";
require "assets/includes/css.php";
include "assets/includes/connect.php";

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
    <div class="row">
        <div class="col-12 text-center">
            <br>
            <h1>Meine Profil</h1>
        </div>