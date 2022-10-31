<?php
$pdo = new PDO('mysql:host=localhost;dbname=accounts', 'Ruzgar', 'Sucuk123!');

if(!isset($_GET['userid']) || !isset($_GET['code'])) {
    die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}

$userid = $_GET['userid'];
$code = $_GET['code'];

//Abfrage des Nutzers
$statement = $pdo->prepare("SELECT * FROM accounts WHERE id = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();

//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user['passwordcode'] === null) {
    die("Es wurde kein passender Benutzer gefunden");
}

if($user['passwordcode_time'] === null || strtotime($user['passwordcode_time']) < (time()-24*3600) ) {
    die("Dein Code ist leider abgelaufen");
}


//Überprüfe den Passwortcode
if(sha1($code) != $user['passwordcode']) {
    die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['send'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2) {
        echo "Bitte identische Passwörter eingeben";
    } else { //Speichere neues Passwort und lösche den Code
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $statement = $pdo->prepare("UPDATE accounts SET password = :passworthash, passwordcode = NULL, passwordcode_time = NULL WHERE id = :userid");
        $result = $statement->execute(array('passworthash' => $passwordhash, 'userid'=> $userid ));

        if($result) {
            die("Dein Passwort wurde erfolgreich geändert");
        }
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="register">

    <h1>Neues Passwort vergeben</h1>
    <form action="?send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
        <input type="password" id="password" placeholder="Neues Passwort" name="password"><br><br>

        <input type="password" id="password" placeholder="Passwort wiederholen" name="password2"><br><br>

        <input type="submit" value="Passwort speichern">
    </form>
</div>