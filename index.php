<?php
require "assets/header/loader.php";
require_once "assets/includes/list.php";
require "assets/includes/css.php";
session_start();

if(!isset($_SESSION["id"])) {
    header("Location: login.php");

}

// If the user is not logged in redirect to the login page...
?>

<html lang="en">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Einkaufsliste by MATX</title>

<body>
    <!-- NAVBAR-->
    <?php require "assets/header/navbar.php" ?>
    <div id="alert"  style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text" id="alerttext">Artikel hinzugefügt!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <br>
                <h1>Einkaufsliste</h1>
            </div>
        </div>
        <!-- Script für Alert -->

        <div id="relList">
            <?php
            echo liste();
            ;?>
        </div>

        <!-- CONTENT END -->
        <!-- JQuery -->
</body>
<!-- NAVBAR END-->
    <!-- CONTENT START-->

</html>