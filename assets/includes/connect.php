<?php
#Datenbankverbindung herstellen
try {
    $einkaufdb = new PDO('mysql:host=91.218.65.223;dbname=einkauf', 'einkauf', 'einkauf1234');
} catch(PDOException $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten: " . $e;
}
try {
    $einkaufUsersDB = new PDO('mysql:host=91.218.65.223;dbname=users-einkaufsliste', 'users-einkaufsliste', '0wd3@k84V');
} catch(PDOException $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten: " . $e;
}
/*try {
    $einkaufUsersPassword= new PDO('mysql:host=91.218.65.223;dbname=password_reset_temp', 'users-einkaufsliste', '0wd3@k84V');
} catch(PDOException $e) {
    echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten: " . $e;
}*/

# Artikel hinzufügen 
function geteinkaufDB(){
    global $einkaufdb;
    return $einkaufdb;
}
function geteinkaufUsersDB() {
    global $einkaufUsersDB;
    return $einkaufUsersDB;
}
function einkaufUsersPassword() {
    global $einkaufUsersPassword;
    return $einkaufUsersPassword;
}
function getUserData($id){
     $getUserData = geteinkaufUsersDB();
    $user = $getUserData->prepare("SELECT * FROM users WHERE id = :id");
    $user->execute([
        "id" => $id
    ]);
    return $user->fetch();
}
function getUserDataByEmail($email){
    $getUserData = geteinkaufUsersDB();
    $user = $getUserData->prepare("SELECT * FROM users WHERE email = :email");
    $user->execute([
        "email" => $email
    ]);
    return $user->fetch();
}
function getAllUsers(){
    $getUserData = geteinkaufUsersDB();
    $users = $getUserData->query("SELECT * FROM users");
    return $users;
}
    # Liste leeren
function createNewList($table_name){
    $id = strval($_SESSION["id"]);
    $table = $table_name . "I" . "$id";
    $getListDatabase = geteinkaufDB();
    $getListDatabase->setAttribute (PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
    $sql = "CREATE table $table(
        ListeID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     userid INT( 11 ) NOT NULL, 
     checked VARCHAR( 250 ) NOT NULL,
     Name VARCHAR( 100 ) NOT NULL, 
     Anzahl VARCHAR( 150 ) NOT NULL)";
    $getListDatabase->exec($sql);

}
function refreshUserData($email ,$name, $password) {
    $id = $_SESSION["id"];
    $refresh = geteinkaufUsersDB();
    if(empty($password)) {
        $send = $refresh->prepare("UPDATE `users` SET `name`= :name,`email`= :email  WHERE id = :id");
        $send->execute([
            "email" => $email,
            "name" => $name,
            "id" => $id,
        ]);
    } else {
        $newpassword = password_hash($password, PASSWORD_DEFAULT);
        $send = $refresh->prepare("UPDATE `users` SET `name`= :name,`email`= :email,`password`= :password   WHERE id = :id");
        $send->execute([
            "email" => $email,
            "name" => $name,
            "id" => $id,
            "password" => $newpassword,
        ]);
    }

}