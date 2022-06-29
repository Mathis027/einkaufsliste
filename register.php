<?php
require "assets/header/loader.php";
require "assets/header/navbar.php";
require "assets/includes/css.php";
require "assets/includes/connect.php";
session_start();

function registerUser() {
    if (empty($_POST["register-name"])) {
        echo "Bitte gebe einen Benutzernamen ein";
    } else {
        if (empty($_POST["register-email"])) {
            echo "Bitte gebe eine Email ein";
        } else {
            if (empty($_POST["register-password"])) {
                echo "Bitte gib ein Passwort ein!";
            } else {
                $email = $_POST["email"];
                $useremail = geteinkaufUsersDB()->query("SELECT email FROM users WHERE email='$email'");
                    if($useremail >0) {
                        $password = password_hash($_POST["register-password"], PASSWORD_DEFAULT);

                        $sendregistration = geteinkaufUsersDB()->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)");
                        $sendregistration->execute([
                            "name" => $_POST["register-name"],
                            "email" => $_POST["register-email"],
                            "password" => $password,
                        ]);
                        echo "Du wurdest erfolgreich registriert";
                    } else{
                        echo "Email exisiteirt bereits";
                    }
                }
            }
        }
    }
registerUser();
?>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-7"> <!-- bisschen space -->
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
                        <form action="" method="POST" name="register" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input name="register-email" type="email" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input name="register-name"type="text" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Passwort</label>
                                    <input name="register-password" type="password" class="form-control">
                                </div>
                            </div>

                            <p class="form-text text-muted mb-3">
                                By registering you agree with our terms and condition.
                            </p>

                            <div class="align-items-center d-flex">
                                <button onclick="<?php registerUser(); ?>" type="submit" class="btn btn-primary ms-auto">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have an account? <a href="login.php" class="text-dark">Login</a>
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