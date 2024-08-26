<?php 
header('Content-Type: application/json');
include_once "Funcoes.php";

$filePath = "uploads/FarbenLabel/Labels/";

if (file_exists($filePath)) {
    $fileVersion = getFileVersion($filePath.'NovasLabels.ini','Novas','date');
    $response = [
        'date' => $fileVersion
    ];
    echo json_encode($response);

} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}


