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
function random_string()
{
    $bytes = random_bytes(16);
    $str = bin2hex($bytes);
    return $str;
}
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
function showTables(){
    $getliststring = geteinkaufUsersDB();
    $strings = $getliststring->prepare("SELECT * FROM listdata WHERE userid LIKE :userid");
    $strings->execute([
        "userid" => $_SESSION["id"],
    ]);
    return $strings;
}
function showSharedTables(){
    $getliststring = geteinkaufUsersDB();
    $strings = $getliststring->prepare("SELECT * FROM listshare WHERE addeduser = :userid");
    $strings->execute([
        "userid" => $_SESSION["id"],
    ]);
    $liststring = $strings->fetch();
    return $liststring;
}
function isListatUser($liststring, $userid) {
    $getliststring = geteinkaufUsersDB();
    $strings = $getliststring->prepare("SELECT * FROM listshare WHERE addeduser = :userid AND liststring = :liststring");
    $strings->execute([
        "userid" => $userid,
        "liststring" => $liststring,
    ]);
    $liststring = $strings->fetch();
    return $liststring;
}
function showListData($liststring){
    $getliststring = geteinkaufUsersDB();
    $strings = $getliststring->prepare("SELECT * FROM listdata WHERE liststring = :liststring");
    $strings->execute([
        "liststring" => $liststring,
    ]);
    return $strings;
}
function getListFromToken($token) {

    $getList = geteinkaufUsersDB();
    $getListToken = $getList->prepare("SELECT * FROM sharelinks WHERE sharetoken = :token");
    $getListToken->execute([
        "token" => $token,
    ]);
    $listToken = $getListToken->fetch();
    return $listToken;
}
function addUserToList($liststring,$userid) {
    $getDB = geteinkaufUsersDB();
    $addUserToList = $getDB->prepare("INSERT INTO `listshare`(`liststring`, `addeduser`) VALUES (:liststring,:addeduser)");
    $addUserToList->execute([
        "liststring" => $liststring,
        "addeduser" => $userid,
    ]);
}
function newShareToken($liststring) {
    $getDB = geteinkaufUsersDB();
    $sharetoken = random_string();
    $allstrings = $getDB->prepare("SELECT * FROM sharelinks WHERE sharetoken = :sharetoken");
    $allstrings->execute([
        "sharetoken" => $sharetoken,
    ]);
    $string = $allstrings->fetch();
    while($string == $sharetoken) {
        $sharetoken = random_string();
        $allstrings = $getDB->prepare("SELECT * FROM sharelinks WHERE sharetoken = :sharetoken");
        $allstrings->execute([
            "liste" => $sharetoken,
        ]);
    }
    $insert = $getDB->prepare("INSERT INTO `sharelinks`(`sharetoken`, `liststring`) VALUES (:sharetoken,:liststring)");
    $insert->execute([
        "sharetoken" => $sharetoken,
        "liststring" => $liststring,
    ]);
    return "https://kraekel.com/share.php?token=" . $sharetoken;
}








    # Liste leeren
function refreshUserData($id, $email ,$name, $password) {
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

function refreshAdminUserData($id, $email ,$name, $is_admin, $password) {
    $refresh = geteinkaufUsersDB();
    if(empty($password)) {
        $send = $refresh->prepare("UPDATE `users` SET `name`= :name,`email`= :email, is_admin = :is_admin  WHERE id = :id");
        $send->execute([
            "email" => $email,
            "name" => $name,
            "id" => $id,
            "is_admin" => $is_admin,
        ]);
    } else {
        $newpassword = password_hash($password, PASSWORD_DEFAULT);
        $send = $refresh->prepare("UPDATE `users` SET `name`= :name,`email`= :email, is_admin = :is_admin, `password`= :password   WHERE id = :id");
        $send->execute([
            "email" => $email,
            "name" => $name,
            "id" => $id,
            "password" => $newpassword,
            "is_admin" => $is_admin,

        ]);
    }

}

