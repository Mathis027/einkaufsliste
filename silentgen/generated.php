<?php
require "assets/required/navbar.php";

$str = $_GET["accounts"];
$str1 = explode(":",  $str);
$other = explode("|", $str1[1] , 50);
$generatorname = "Default";
$gen_pass = "";
$gen_mail = $str1[0];
$gen_pass = $other[0];
$gen_other = $other[1];
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



<main class="main-content  mt-5">
    <div class="align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" >
       <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header pb-0 ">

                                <h3 class="text-center "><?php echo $generatorname;?></h3>
                            </div>
                                <div class="card-body px-4 pt-0 pb-2">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold mb-3">Your Account: </p>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" value="<?php echo $gen_mail ?>" readonly class="form-control" placeholder="Email" aria-label="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="text" value="<?php echo $gen_pass ?>" readonly class="form-control" placeholder="Password" aria-label="Password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="other">Other Informations</label>
                                        <input type="text"  name="other" value="<?php echo $gen_other ?>" readonly class="form-control" placeholder="Other informations" aria-label="Other Informations">
                                    </div>
                                    <div class="mb-2 align-items-end">
                                        <button class="btn btn-sm mb-0 me-1 btn-primary">Refresh Account Data</button>
                                    </div>
                                </div>
                        </div>
                    </div>
               <div class="col-12 col-md-6 col-lg-6">
                   <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h4 class="text-center">Feedback</h4>
                                <h6>What do you think of our service?</h6>
                                <form action="https://accounts.silent-gen.com/sendfeedback.php" METHOD="post">
                                    <label for="discordtag">Discord tag</label>
                                    <input required name="discordtag" placeholder="SIlENT-GEN#3820" type="text" class="form-control w-50">
                                    <br>
                                    <label for="text">What can we do better?</label>
                                    <textarea required name="feedback" class="form-control mb-2" placeholder="Make a good design a$$"></textarea>

                                    <input type="hidden" value="hfuiewhiuh29834zthuerfn34985uhrtg" name="token">
                                    <button type="submit" class="btn btn-success" value="absenden">Send</button>
                                </form>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


    $("#btnform").on("submit", function(event) {
        event.preventDefault();
        document.getElementById("btnform").style.visibility = "none";
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>