<?php
require "assets/header/loader.php";
require_once "assets/includes/list.php";
require "assets/includes/css.php";
?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Einkaufsliste by MATX</title>
</head>
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
                <h1>Einkaufslfwefewiste</h1>
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