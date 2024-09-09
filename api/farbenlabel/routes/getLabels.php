<?php 
header('Content-Type: application/json');
include_once "api/farbenlabel/class/classGetLabels.php";

$filePath = "uploads/FarbenLabel/Labels/Labels.zip";
$fileHandler = new FileHandler($filePath);
$fileHandler->validate();




