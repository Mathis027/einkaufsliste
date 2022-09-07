<?php
require "assets/includes/connect.php";

$db = getDB();

if (isset($_POST["leeren"]))
{
    $table = $_POST["list"];
    $db->query("DELETE FROM `$table`");
}
if(isset($_POST["newaccountdata"])) {

    $text = file_get_contents( $_FILES["datei"]["tmp_name"]);

    $array = explode("\n",  $text);

    $table = $_POST["list"];

    foreach ($array as $account){

        $stmt = $db->prepare("INSERT INTO `$table` (`account`, `date`) VALUES (:account, CURRENT_DATE )");
        $stmt->execute([
                "account" => $account,
        ]);

    }
    echo "Datei hochgeladen!";
}
$lists = showlists();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <title>
        Silent-Gen Account Generator
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/88347fd530.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>
<body class="container ">
<div class="col-sm-12 col-md-8 col-lg-6 text-center">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h4 class="text-center">Upload new Account Listen</h4>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <label class="fs-5" for="list">Wähle eine Liste</label><br>
                        <select required name="list" class="form-select">
                            <?php
                            foreach($lists as $list): ?>
                            <option><?php echo $list ?></option>
                            <?php endforeach;?>

                        </select><br>
                    </div>
                    <div class="col-6">
                        <label class="fs-5" for="datei">Wähle eine Datei</label><br>
                        <input required class="form-control" name="datei" type="file"><br>
                    </div>
                    <label class="fs-6" for="leeren">Vorhandene Liste leeren?</label>
                    <input name="leeren" type="checkbox" class="form-check">
                    <br>
                    <input type="submit" class="btn btn-primary" NAME="newaccountdata" value="Hochladen">
                </div>
            </form>
        </div>
    </div>
</div>
</body>





</body>