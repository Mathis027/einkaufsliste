<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: ../index.php");
}
require "../assets/header/navbar.php";
require "../assets/includes/css.php";
include "../assets/includes/connect.php";
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
    <div class="row">
        <div class="col-12 text-center">
            <br>
            <h1>Meine Listen</h1>
        </div>

        <?php
        $user = getUserData($_SESSION["id"]);

        if ($user["id"] !== 0){?>
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <div class="card-title input-group input-group-outline my-3">
                            <label class="form-label">Listen Name</label>
                            <input name="newlistname" type="text" class="form-control">
                        </div>
                    </div>
                    <p class="card-text">Hier kannst du später deine Sachen einstellen.</p>
                    <button type="submit" class="btn btn-primary">Neue Liste</button>

                </form>
            </div>
        </div>
        <?php }; ?>
        <div id="relList">
            <?php
            echo listAllLists();
            ;?>
        </div>
    </div>

    </body>
</html>
