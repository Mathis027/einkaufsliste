<?php
session_start();
require "./assets/include/connect.php";
require "./assets/include/css.php";
require "./assets/header/navbar.php";?>
<script type="text/javascript" src="./assets/js/scripts.js"></script>
<div id="alert"  style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-text" id="alerttext">!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
<div class="container">
    <div class="row justify-content-sm-center h-100">
        <div class="col-12 text-center">
            <br>
            <h1>Passwort zurücksetzen</h1>
        </div>
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <form method="POST" class="needs-validation" action="./assets/functionsPHP/sendPasswordReset.php" novalidate="" autocomplete="on">
                        <div class="mb-3">
                            <div class="input-group input-group-static my-3">
                                <label>Deine Email </label>
                                <input name="reset-email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary ms-auto submit-new-data">
                                Absenden
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>