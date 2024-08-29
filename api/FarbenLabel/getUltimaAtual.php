<?php 
    //Retorna a versão do executavel!
    header('Content-Type: application/json');
    include_once "Funcoes.php";

    $filePath = "uploads/FarbenLabel/";
   
    if (file_exists($filePath)) {
        $fileVersion = getFileVersion($filePath.'UltimaAtual.ini','Atualizacao','data');
        $response = [
            'ultima' => $fileVersion
        ];
        echo json_encode($response);

    } else {
        echo json_encode(['Erro' => 'Arquivo não encontrado']);
    }
?>
