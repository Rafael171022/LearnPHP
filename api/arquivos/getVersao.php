<?php 
    include_once "pegaVersaoExe.php";

    $filePath = "C:\Farben Labelatualizar\Exe\FarbenLabel.zip";
    //$filePath = "C:\TestesAPI\config-Base.ini";

    if (file_exists($filePath)) {
        // Obtém a versão do arquivo
        $fileVersion = getFileVersion($iniFilePath);
        $response = [
            'versao' => $fileVersion
        ];
        echo json_encode($response);

    } else {
        echo json_encode(['Erro' => 'Arquivo não encontrado']);
    }
?>
