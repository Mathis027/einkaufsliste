<?php

if(isset($_POST["list"]))  {
    $_SESSION["list"] = $_POST["list"];
    $_SESSION["listname"] = explode("_", $_POST["list"]);
    header("Location: ../../index.php");
}
function listAllLists(){
    $user = getUserData($_SESSION["id"]);
    $lists = showTables();
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
        $num = 0;
        $rowrare = $rows[$num];
        $row = explode("_", $rows[$num])
        ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-head btn-liste-loeschen">
                    <form action="../../assets/functionsPHP/loschen.php" id="deleteListForm" method="post">
                        <input hidden name="list" value="<?php echo $rowrare; ?>">
                        <button class="btn btn-danger btn-sm" type="submit">x</button>

                    </form>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <div class="card-title input-group input-group-outline my-3">
                                <h3><?php echo $row[0]; ?></h3>
                            </div>
                        </div>
                        <input hidden name="list" type="text" value="<?php echo $rowrare; ?>">
                        <button type="submit" class="btn btn-primary">Zur Liste</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    $num++;
    endforeach;
}?>
<script>

</script>
