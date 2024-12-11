<?php 
header('Content-Type: application/json');
include_once "api/reclama/class/classGetVersaoLabels.php";

$fileHandler = new ManipuladorDeVersaoDeArquivo();
$fileHandler->validarVersao();