<?php
session_start();
require "assets/includes/connect.php";
if(isset($_SESSION["id"])) {
    header("Location: list/mylists.php");
}

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
        echo "";
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
        setcookie("securitytoken",sha1($neuer_securitytoken),time()+(3600*24*365)); //1 Jahr Gültigkeit

        //Logge den Benutzer ein
        $_SESSION['id'] = $securitytoken_row['user_id'];
        header("Refresh: 0");
    }
}

require "assets/includes/css.php";
require "assets/header/navbar.php";


function loginUser(){

    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $statement = geteinkaufUsersDB()->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email' => $email));
            $user = $statement->fetch();
            if(password_verify($password, $user["password"])) {
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                header("Refresh: 0");


                function random_string()
                {
                    $bytes = random_bytes(16);
                    $str = bin2hex($bytes);
                    return $str;
                }

                if ($_POST["remember"] == 1) {
                    $identifier = random_string();
                    $securitytoken = random_string();

                    $insert = geteinkaufUsersDB()->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:userid, :identifier, :securitytoken)");
                    $insert->execute([
                        "userid" => $user["id"],
                        "identifier" => $identifier,
                        "securitytoken" => $securitytoken,
                    ]);
                    setcookie("identifier", $identifier, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit
                    setcookie("securitytoken", $securitytoken, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit
                    header("Refresh: 0");
                }
            }
            else {
                echo "Passwort oder Email Adresse ist falsch";

            }
    }

}
loginUser();
 ?>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-7"> <!-- bisschen space -->
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Passwort</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" value="1" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            <a href="reset-your-password.php" class="text-dark">Passwort vergessen</a>
                        </div>
                        <div class="text-center">
                            Don't have an account? <a href="register.php" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; 2017-2021 &mdash; Your Company
                </div>
            </div>
        </div>
    </div>
</section>