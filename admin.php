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
if($user["is_admin"] !== 1){
    header("Location: index.php");
}else {
    echo "Willkommen Admin " . $user["name"];
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
    <div class="card shadow-lg">
    <div class="card-body p-5">
        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
            <div class="mb-3">
                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input value="<?php echo $user["name"]; ?>" type="text" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group input-group-static my-3">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user["email"] ?>" type="email" class="form-control">
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary ms-auto">
                    Bestätigen
                </button>
            </div>
        </form>
    </div>
    </div>
