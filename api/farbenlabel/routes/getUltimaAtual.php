<?php 
header('Content-Type: application/json');
include_once "api/farbenlabel/class/classGetDataUltAtu.php";

$fileHandler = new AppDateHandle();
$fileHandler->checkfile();
