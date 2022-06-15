<?php
require "assets/includes/css.php"; ?>
<script>
    $(window).on('load', function () {
        $(".o-page-loader").hide();
    });

</script>
<div class="o-page-loader" style="display: block">
    <div class="o-page-loader--content">
        <div class="o-page-loader--spinner"></div>
        <div class="o-page-loader--message">
            <span>Loading...</span>
        </div>
    </div>
</div>