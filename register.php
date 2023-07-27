<?php
session_start();

require "./assets/header/navbar.php";
require "./assets/include/css.php";
require "./assets/include/connect.php";

if(isset($_SESSION["id"])) {
    header("Location: ./index.php");
}
$error = "";
// If the user is not logged in redirect to the login page...
function registerUser() {
    if(isset($_GET["register"])) {
    if($_GET["register"] == 1){
        $name = $_POST["register-name"];
        $email = $_POST["register-email"];
        $password = $_POST["register-password"];
        if (empty($name)) {
            echo "<div class='error'>Bitte gebe einen Namen ein</div>";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='error'>Bitte eine gültige Email eingeben</div>";
            } else {
                if (empty($password)) {
                    echo  "<div class='error'>Bitte vergebe ein Passwort</div>";
                } else {
                    $statement = geteinkaufUsersDB()->prepare("SELECT * FROM users WHERE email = :email");
                    $result = $statement->execute(array('email' => $email));
                    $user = $statement->fetch();

                    if (!$user) {
                        $password = password_hash($_POST["register-password"], PASSWORD_DEFAULT);

                        $sendregistration = geteinkaufUsersDB()->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)");
                        $sendregistration->execute([
                            "name" => $name,
                            "email" => $email,
                            "password" => $password,
                        ]);
                        echo "Du wurdest erfolgreich registriert";
                        $statement = geteinkaufUsersDB()->prepare("SELECT * FROM users WHERE email = :email");
                        $result = $statement->execute(array('email' => $email));
                        $user = $statement->fetch();
                        $_SESSION["id"] = $user["id"];
                        $_SESSION["name"] = $user["name"];
                        $_SESSION["email"] = $user["email"];
                        header("Refresh: 2");
                    } else {
                        echo "<div class='error'>Email exisitiert bereits</div>";

                    }

                }
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
                        <div><p> <?php echo $error ?></p></div>
                        <form action="?register=1" method="POST" class="needs-validation" novalidate="" autocomplete="off">

                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input name="register-name"type="text" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input name="register-email" type="email" class="form-control">
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
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have an account? <a href="./login.php" class="text-dark">Login</a>
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
