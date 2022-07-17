<?php
session_start();
require "assets/includes/connect.php";
require "assets/includes/css.php";
if(isset($_GET["token"])) {
    echo  '<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-7"> <!-- bisschen space -->
                </div>
                <div class="card shadow-lg">
            <div class="card-body p-5">
                <form method="POST" class="needs-validation" novalidate="" autocomplete="on">
                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Neues Passwort</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Passwort bestätigen</label>
                            <input name="password-verify"  type="password" class="form-control"  autocomplete="on">
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
        </div>
        </div>
        </div>
        </section>';
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $token = $_GET["token"];
        $user = getUserDataByEmail($email);
        echo $token;
        if($token == $user["passwordToken"]){
            if($_POST["password"] and $_POST["password-verify"] !== null) {
                if ($_POST["password"] == $_POST["password-verify"]) {
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $db = geteinkaufUsersDB();
                    $stmt = $db->prepare("UPDATE users SET password = :password WHERE email = :email ");
                    $stmt->execute([
                        "password" => $password,
                        "email" => $email,
                    ]);
                    echo "Passwort wurde aktualisiert";
                }
            }

        } else {
            echo "Bitte eine Email Adresse eintragen";
        }

    } else {
        echo "Link abgelaufen oder Token falsch";
    }
} else {
    echo "Fehler";
}