<?php
session_start();
require "assets/includes/css.php";
require "assets/header/navbar.php";
require "assets/includes/connect.php";

if(isset($_SESSION["id"])) {
    header("Location: index.php");
}
function loginUser(){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($email) && !empty(($password))) {
            $statement = geteinkaufUsersDB()->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email' => $email));
            $user = $statement->fetch();
            if(password_verify($password, $user["password"])) {
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                header("Refresh:0");
            } else {
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
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
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