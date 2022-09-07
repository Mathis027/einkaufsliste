<!-- Navbar -->
<?php require "assets/includes/connect.php" ;
$lists = showlists();
?>

<body style="background: linear-gradient(to bottom, #1e5799 0%,#97b9d5 100%);">

<nav class="navbar navbar-expand-lg blur top-0 z-index-3 shadow position-absolute py-2 start-0 end-0 ">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="index.php">
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
                <?php foreach($lists as $type1):
                    $type = ucfirst($type1);?>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="index.php?type=<?php echo $type1; ?>">
                        <img src="assets/img/<?php echo $type; ?>.png" class="me-1" alt="">
                        <?php echo $type; ?>
                    </a>
                </li>
                <?php endforeach; ?>
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
