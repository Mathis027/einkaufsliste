<?php
session_start();
require "./assets/include/connect.php";
require "./assets/include/css.php";
require "./assets/header/navbar.php";?>
<script src="">
</script><script type="text/javascript" src="./assets/js/scripts.js"></script>
<div id="alert"  style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-text" id="alerttext">Artikel hinzugefügt!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
<div class="container">
    <div class="row justify-content-sm-center h-100">
        <div class="col-12 text-center">
            <br>
            <h1>Passwort zurücksetzen</h1>
        </div>
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <form method="POST" class="needs-validation" novalidate="" autocomplete="on">
                        <div class="mb-3">
                            <div class="input-group input-group-static my-3">
                                <label>Neues Passwort</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-static my-3">
                                <label>Passwort bestätigen</label>
                                <input name="password-verify"  type="password" class="form-control">
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
<?php
if(isset($_GET["token"])){
    $email = $_GET["email"];
    $token = $_GET["token"];
    $user = getUserDataByEmail($email);
    if($token == $user["passwordToken"]){
        if(isset($_GET["email"])){
            if(isset($_POST["password"]) and $_POST["password-verify"]) {
                if ($_POST["password"] == $_POST["password-verify"]) {
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $db = geteinkaufUsersDB();
                    $stmt = $db->prepare("UPDATE users SET password = :password WHERE email = :email ");
                    $stmt->execute([
                        "password" => $password,
                        "email" => $email,
                    ]);
                    $stmt = $db->prepare("UPDATE users SET passwordToken = '' WHERE email = :email ");
                    $stmt->execute([
                        "email" => $email,
                    ]);
                    echo "<script>startAlert('Passwort aktualisiert', 'alert-success', 'alert-danger')</script>";
                } else {
                    echo "<script>startAlert('Passwörter stimmen nicht überein', 'alert-danger', 'alert-success')</script>";
                }
            } else {
                echo "<script>startAlert('Tragen sie bitte identische Passwörter  ein!', 'alert-danger', 'alert-success')</script>";

            }

        } else {
            echo "<script>startAlert('Link matched nicht mit Email', 'alert-danger', 'alert-success')</script>";
        }

    } else {
        echo "";
    }
} else {
    echo "<script> startAlert('Link abgelaufen oder Token falsch', 'alert-danger', 'alert-success')</script>";
}
?>
