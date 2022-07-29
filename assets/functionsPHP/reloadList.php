<?php
session_start();
require "../includes/list.php";
$list = $_SESSION["list"];
echo liste($list);