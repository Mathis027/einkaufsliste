<?php
session_start();
require "assets/includes/connect.php";
//Überprüfe auf den 'Angemeldet bleiben'-Cookie
if(!isset($_SESSION['id']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])) {
    $identifier = $_COOKIE['identifier'];
    $securitytoken = $_COOKIE['securitytoken'];

    $statement = geteinkaufUsersDB()->prepare("SELECT * FROM securitytokens WHERE identifier = :identifier");
    $result = $statement->execute([
            "identifier" => $identifier,
        ]
    );
    $securitytoken_row = $statement->fetch();

    if($securitytoken !== $securitytoken_row['securitytoken']) {
        header("Location: login.php");
    } else { //Token war korrekt
        //Setze neuen Token
        function random_string()
        {
            $bytes = random_bytes(16);
            $str = bin2hex($bytes);
            return $str;
        }
        $neuer_securitytoken = random_string();
        $insert = geteinkaufUsersDB()->prepare("UPDATE securitytokens SET securitytoken = :securitytoken WHERE identifier = :identifier");
        $insert->execute(array('securitytoken' => sha1($neuer_securitytoken), 'identifier' => $identifier));
        setcookie("identifier",$identifier,time()+(3600*24*365)); //1 Jahr Gültigkeit
        setcookie("securitytoken",$neuer_securitytoken,time()+(3600*24*365)); //1 Jahr Gültigkeit

        //Logge den Benutzer ein
        $_SESSION['id'] = $securitytoken_row['user_id'];
        var_dump($securitytoken);
    }
}

require "assets/includes/css.php";
require_once "assets/includes/list.php";


// If the user is not logged in redirect to the login page...
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
                <h1><?php $listName = $_SESSION["listname"]; echo($listName[0]); ?></h1>
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
        <script src="assets/js/autocomplete.js">
</body>

<!-- NAVBAR END-->
    <!-- CONTENT START-->

</html>