<?php
function listAllLists(){
    $user = getUserData($_SESSION["id"]);
    foreach($user["listen"] as $listElement):
    ?>

    <div><h1>Hallo ich bin die <?php echo $user["name"] ?></h1></div>
<?php endforeach; {

}}?>