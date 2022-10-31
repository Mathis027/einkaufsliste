<?php
$pdo = new PDO('mysql:host=localhost;dbname=accounts', 'Ruzgar', 'Sucuk123!');

function random_string() {
    if(function_exists('random_bytes')) {
        $bytes = random_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('mcrypt_create_iv')) {
        $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $str = bin2hex($bytes);
    } else {
        //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
        $str = md5(uniqid('euer_geheimer_string', true));
    }
    return $str;
}


$showForm = true;

if(isset($_GET['send']) ) {
    if(!isset($_POST['email']) || empty($_POST['email'])) {
        $error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
    } else {
        $statement = $pdo->prepare("SELECT * FROM accounts WHERE email = :email");
        $result = $statement->execute(array('email' => $_POST['email']));
        $user = $statement->fetch();

        if($user === false) {
            $error = "<b>Kein Benutzer gefunden</b>";
        } else {
            //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
            $passwordcode = random_string();
            $statement = $pdo->prepare("UPDATE accounts SET passwordcode = :passwordcode, passwordcode_time = NOW() WHERE id = :userid");
            $result = $statement->execute(array('passwordcode' => sha1($passwordcode), 'userid' => $user['id']));

            $empfaenger = $user['email'];
            $betreff = "Neues Passwort"; //Ersetzt hier den Domain-Namen
            $from = "From: 180Services <noreply@180eywa.com>"; //Ersetzt hier euren Name und E-Mail-Adresse
            $url_passwordcode = 'http://180eywa.com/passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwordcode; //Setzt hier eure richtige Domain ein
            $text = 'Hallo '.$user['vorname'].',
für deinen Account auf 180eywa.com wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
'.$url_passwordcode.'
 
Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.
 
Viele Grüße,
';

            mail($empfaenger, $betreff, $text, $from);

            echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";
            $showForm = false;
        }
    }
}

if($showForm):
    ?>
<div class="register">

    <h1>Passwort vergessen</h1>
    <p class="noregistration-sub">Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<p><br>

    <?php
    if(isset($error) && !empty($error)) {
        echo $error;
    }
    ?>

    <link rel="stylesheet" href="style.css">

    <form action="?send=1" method="post">
        <input type="email" id="email" name="email"  placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
        <input type="submit" value="Neues Passwort">
    </form>
</div>
<?php
endif; //Endif von if($showForm)
?>

