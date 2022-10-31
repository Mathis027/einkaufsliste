<?php
session_start();
require __DIR__ . "/assets/includes/connect.php";
if(!isset($_SESSION["id"])) {
    header("Location: /login.php");
}
//Überprüfe auf den 'Angemeldet bleiben'-Cookie
require __DIR__ . "/assets/includes/css.php";
require __DIR__ . "/assets/header/navbar.php";

require_once __DIR__ . "/assets/includes/list.php";

// If the user is not logged in redirect to the login page...
?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Einkaufsliste by MATX</title>
    <script src="https://kit.fontawesome.com/88347fd530.js" crossorigin="anonymous"></script>
    <script  src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/cssTheme/css/nucleo-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Core -->
    <script src="assets/cssTheme/js/core/popper.min.js"></script>
    <script src="assets/cssTheme/js/core/bootstrap.bundle.min.js"></script>
    <!-- Theme JS -->
    <link href="assets/cssTheme/css/material-kit.css" rel="stylesheet">
    <script src="assets/cssTheme/js/material-kit.js"></script>
    <script src="https://kit.fontawesome.com/88347fd530.js" crossorigin="anonymous"></script>
</head>


<body>
    <!-- NAVBAR-->
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
                <h1><?php $listName = $_SESSION["listname"]; echo($listName); ?></h1>
            </div>
        </div>
        <!-- Script für Alert -->

        <div id="relList">
            <?php
            $liste = $_SESSION["list"];
            echo liste($liste);
            ?>
        </div>

        <!-- CONTENT END -->
        <!-- JQuery -->
</body>

<!-- NAVBAR END-->
    <!-- CONTENT START-->

</html>