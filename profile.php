<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: ../index.php");
}
require "assets/header/navbar.php";
require "assets/includes/css.php";
include "assets/includes/connect.php";
$user = getUserData($_SESSION["id"]);
if(isset($_POST["submit-new-data"])) {
    $name =$_POST["name"];
    $email =$_POST["email"];
    $password =$_POST["password"];

    refreshUserData($email, $name, $password);

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
            <h1>Meine Profil</h1>
        </div>
        <div class="card shadow-lg">
            <div class="card-body p-5">
                <form method="POST" class="needs-validation" novalidate="" autocomplete="on">
                    <div class="mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Name</label>
                            <input name="name" value="<?php echo $user["name"]; ?>" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Email</label>
                            <input name="email" value="<?php echo $user["email"] ?>" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Neues Passwort</label>
                            <input name="password"  type="password" class="form-control"  autocomplete="on">
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <button type="submit" name="submit-new-data" class="btn btn-primary ms-auto submit-new-data">
                            Bestätigen
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(".submit-new-data").on('click', function(){
            });
            </script>