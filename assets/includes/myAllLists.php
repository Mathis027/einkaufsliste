<?php

$lists = showTables();
if(isset($_POST["list"]))  {
    $_SESSION["list"] = $_POST["list"];
    $_SESSION["listname"] = $_POST["listname"];
    header("Location: ../index.php");
}
function listAllLists(){
    $user = getUserData($_SESSION["id"]);
    global $lists;
    echo '<div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h3>Neu erstellen</h3>
                        <form method="post" id="newListForm">
                            <div class="mb-3">
                                <div class="card-title input-group input-group-outline my-3">
                                    <label class="form-label">Listen Name</label>
                                    <input name="newListName" type="text" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Neue Liste</button>

                        </form>
                    </div>
                </div>
        </div>';
    foreach($lists as $rows):

        ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-head btn-liste-loeschen">
                    <form action="../../assets/functionsPHP/loschen.php" id="deleteListForm" method="post">
                        <input hidden name="liststring" value="<?php echo $rows["liststring"]; ?>">
                        <button class="btn btn-danger btn-sm" type="submit">x</button>

                    </form>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <div class="card-title input-group input-group-outline my-3">
                                <h3><?php echo $rows["listname"]; ?></h3>
                            </div>
                        </div>
                        <input hidden name="list" type="text" value="<?php echo $rows["liststring"]; ?>">
                        <input hidden name="listname" type="text" value="<?php echo $rows["listname"]; ?>">
                        <button type="submit" class="btn btn-primary">Zur Liste</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    endforeach;
}?>
<script>

</script>
