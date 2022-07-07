<?php
// Change this to your connection info.
if(!empty($_POST)) {
    require "db.php";
// Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        exit('Bitte verfollständige das Registrierungsformular');
    }
// Make sure the submitted registration values are not empty.
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        exit('Bitte verfollständige das Registrierungsformular');
    }

// We need to check if the account with that username exists.
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        // Store the result so we can check if the account exists in the database.
        if ($stmt->num_rows > 0) {
            // Username already exists
            echo 'Dieser Discord Name ist bereits vergeben!!';
        } else {
            // Username doesnt exists, insert new account
            if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();


                // Email anpassbar //
                $empfaenger = $_POST['email'];
                $betreff = "Herzlich Willkommen!";
                $from = "From: Jaweb HTML <noreply@jaweb.com>";
                $text = "Danke das du dich bei uns registriert hast.";

                mail($empfaenger, $betreff, $text, $from);

                // Email anpassbar //


                $id = $con->prepare("SELECT id FROM accounts WHERE username = ?");
                $id->bind_param("s", $_POST["username"]);
                $id->execute();
                echo 'Du hast dich erfolgreich registriert';
                session_start();
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION["id"] = $id;

                // Mail verschicke

                //
                header("Location: success-registration.php");

            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                echo 'Anfrage konnte nicht bearbeitet werden!';
            }
        }
        $stmt->close();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registrieren</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
<div class="register">
    <h1>Registrieren</h1>
    <form id="register-form"action="" method="post" autocomplete="off">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Discord Name" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <div class="g-recaptcha" data-sitekey="6LeN5J8gAAAAAN2244bRAlvMrTrPxV9RAjg2te_3"></div>
        <br/>
        <input type="submit" value="Submit">

        <p class="noregistration-sub">Hast du bereits einen Account? <a href="login.php">Login</a></p>

    </form>
</div>
</body>
</html>

