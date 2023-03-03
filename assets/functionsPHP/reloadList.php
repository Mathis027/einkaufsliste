<?php
session_start();
require "../../assets/include/list.php";
$list = $_SESSION["list"];
echo liste($list);