<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="/index.php" class="navbar-brand">Einkaufsliste</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon">
     <i class="fas fa-bars" style="color:#000; font-size:28px;"></i>
</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="/list/mylists.php" class="nav-item nav-link">Meine Listen</a>
                <a href="/profile.php" class="nav-item nav-link">Mein Profil</a>
                <a href="/admin.php" id="admin_navbar_button" class="nav-item nav-link">Admin</a>
            </div>‚
            <div class="navbar-nav ms-auto">
                <?php if(!isset($_SESSION["id"])){ ?>
                    <button class="btn bg-gradient-primary mb-0" onclick="window.location.href='login.php'">Login</button>
                <?php } ?>
                <!-- ewfj -->
                <?php if(isset($_SESSION["id"])){ ?>
                    <button class="btn bg-gradient-primary mb-0" onclick="window.location.href='../../logout.php'">Logout</button>
                <?php } ?>



            </div>
        </div>
    </div>
</nav>
<div id="alert"  style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-text" id="alerttext">Artikel hinzugefügt!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
