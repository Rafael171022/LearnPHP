<?php 
header('Content-Type: application/json');
include_once "api/farbenlabel/class/classGetVersaoLabels.php";

$fileHandler = new FileVersionHandle();
$fileHandler->validateVersion();