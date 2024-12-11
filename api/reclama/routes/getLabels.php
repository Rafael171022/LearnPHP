<?php 
header('Content-Type: application/json');
include_once "api/reclama/class/classGetLabels.php";

$filePath = "uploads/reclama/Labels/Labels.zip";
$fileHandler = new ManipuladorDeArquivo($filePath);
$fileHandler->validar();




