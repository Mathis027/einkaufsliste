<?php
$generatorname = "Default";
$gen_pass = $_GET["genpass"];
$gen_mail = $_GET["genmail"];
$generatorname = $_GET["genname"];

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

<body style="background: linear-gradient(to bottom, #1e5799 0%,#97b9d5 100%);">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                        Silent-GEN
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                                    <img src="assets/img/minecraft.png" class="me-1" alt="">
                                    Minecraft
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="index.php?type=disney">
                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                    Disney
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="index.php?type=disney">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Netflix
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="index.php?type=Crunchyroll">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Crunchyroll
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a href="https://discord.com" target="_blank" class="btn btn-sm mb-0 me-1 btn-primary"><i class="fa-brands fa-discord me-1"></i> Discord</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->


<main class="main-content  mt-5">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" >
       <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
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
                                    <div class="mb-2 align-items-end">
                                        <button class="btn btn-sm mb-0 me-1 btn-primary">Refresh Account Data</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
           <div class="row">
               <div class="col-12">
                   <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Feedback</h6>

                                
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
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>