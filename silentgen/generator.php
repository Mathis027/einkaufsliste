<?php
require "assets/required/navbar.php";

$currentaccounts = 12;

if(isset($_GET["type"])) {
    $generatorname = $_GET["type"];
    $dbname = strtolower($_GET["type"]);
    $filename = strtolower($generatorname) . ".txt";
} else {
    $generatorname = "Netflix";
    $dbname = strtolower($generatorname);
    $filename = strtolower($generatorname) . ".txt";
}
echo $generatorname;
$instock = stockAbfrage($dbname);
$lastupdated = lastUpdated($dbname);


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
    <!--<script src="https://publisher.linkvertise.com/cdn/linkvertise.js"></script><script>linkvertise(110463, {whitelist: ["accounts.silent-gen.com",""], blacklist: []});</script>-->
</head>



<main class="main-content ">
    <div class="container">
    <div class="align-items-center justify-content-center mt-5 pt-5 text-center" >
                <div class="row">
                    <div class="col-12" >
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h3><?php echo $generatorname;?></h3>
                                <br>
                            </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <p>Click to generate a new account</p>
                                   <form method="post">
                                        <input hidden type="text" name="generate" value="generate-new">
                                        <button onclick="" type="submit" class="btn btn-generate btn-primary btn-md"><i class="fa-solid fa-sync fa-spin"></i>
                                            Generate Account</button>
                                       <br><span><?php echo $instock;?> Accounts available</span>
                                       <div class="mb-3">
                                           <span><b>Last updated: <?php echo $lastupdated[0];?></b></span>

                                       </div>
                                    </form>
                                    <?php
                                    if(isset($_POST["generate"])) {

                                        $db = getDB();
                                        $stmt = $db->query("SELECT account FROM `$dbname` ORDER BY RAND() LIMIT 1");
                                        $link = $stmt->fetch();
                                        echo '<a class="generate-link fs-4" target="_blank" href="https://accounts.silent-gen.com/bla/generated.php?accounts=' . urlencode($link["account"]) . '">click here</a>';
                                    }

                                    ?>
                                </div>
                                <div class="card-footer ">
                                    <div class="d-flex align-items-center justify-content-end " >
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div  class="d-flex align-items-center justify-content-center justify-content-md-start justify-content-lg-start">
                                                <span class="me-2 text-md font-weight-bold">Available chance</span>

                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="me-2 text-md font-weight-bold">60%</span>
                                                <div class="col-lg-10 col-md-10 col-10">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    </div>
                        </div>
                                </div>
                        </div>
                </div>
                   <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Our Account Stats</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Service</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Current Accounts</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Available chance</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($lists as $list):
                                            $listname = ucfirst($list);
                                            $atstock = stockAbfrage($list);
                                            ?>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="assets/img/<?php echo $list ?>.png" class="avatar avatar-sm rounded-circle me-4" alt="spotify">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm"><?php echo $listname; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?php echo $atstock; ?></p>
                                            </td>
                                            <td>
                                                <span class="badge badge-sm bg-gradient-success">working</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">60%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

</main>
<!--   Core JS Files   -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.js?v=2.0.4"></script>
</body>

</html>