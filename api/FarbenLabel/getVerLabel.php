<?php 
header('Content-Type: application/json');
include_once "Funcoes.php";

$iniFilePath = "uploads/FarbenLabel/Labels/NovasLabels.ini";
$filePath = "uploads/FarbenLabel/Labels/";

if (file_exists($filePath)) {
    $fileVersion = getFileVersion($iniFilePath,'Novas','date');
    $response = [
        'date' => $fileVersion
    ];
    echo json_encode($response);

} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}


