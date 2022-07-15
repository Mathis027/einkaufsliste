<?php

session_start();
require "assets/header/navbar.php";
require "assets/includes/css.php";
include "assets/includes/connect.php";
if(!isset($_SESSION["id"])) {
    header("Location: ../index.php");
}
$user = getUserData($_SESSION["id"]);

echo $user["is_admin"];
if($user["is_admin"] == 1){
    echo "Willkommen Admin " . $user["name"];
}else {
    header("Location: index.php");
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
        <h1>Admin Bereich</h1>
    </div>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Mail</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Admin?</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Reset Password</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
                </thead>
        <?php
        $allusers = getAllUsers();
        foreach ($allusers AS $users): ?>
                    <tbody>
                    <tr>
                        <td>
                                <div class="table-item-name">
                                    <h6 class="mb-0 text-xs"><?php echo $users["name"]?></h6>
                                </div>
                        </td>
                        <td>
                            <div class="table-item-name">
                                <h6 class="mb-0 text-xs"><?php echo $users["email"]?></h6>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="table-item-name">
                                <h6 class="mb-0 text-xs"><?php echo $users["is_admin"]?></h6>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <form action="assets/functionsPHP/sendPasswordReset.php" method="post">
                                <input  hidden name="reset-email" value="<?php echo $users['email']; ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Reset</button>
                            </form>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-primary btn-sm">Edit</button>

                        </td>
                    </tr>
    </div>
    <?php endforeach; ?>
