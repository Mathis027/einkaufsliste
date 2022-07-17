<?php
require "assets/includes/connect.php";
if(isset($_GET["token"])) {
    $token = $_GET["token"];
    $user = getUserData($_SESSION["id"]);
    if($token == $user["token"]){
        echo  '<div class="card shadow-lg">
            <div class="card-body p-5">
                <form method="POST" class="needs-validation" novalidate="" autocomplete="on">

                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Email</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group input-group-static my-3">
                            <label>Neues Passwort</label>
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
        </div>';
        if($_POST["password"] and $_POST["password-verify"] !== null) {
            if ($_POST["password"] == $_POST["password-verify"]) {
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $db = geteinkaufUsersDB();
                $stmt = $db->prepare("UPDATE users SET password = :password WHERE email = :email ");
                $stmt->execute([
                    "password" => $password,
                    "email" => $user["email"],
                ]);
            }
        }

    } else {
        echo "Link abgelaufen oder Token falsch";
    }
} else {
    echo "Link abgelaufen oder nicht verfpgbar";
}