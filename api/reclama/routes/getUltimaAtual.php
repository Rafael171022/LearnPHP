<?php 
header('Content-Type: application/json');
include_once "api/reclama/class/classGetDataUltAtu.php";

$fileHandler = new ultimaAtualizacao();
$fileHandler->verificarArquivo();
