<?php
include_once "pegaVersaoExe.php";

// Passo 1: Receber e decodificar o JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$newVersion = $data['versao'];

if (isset($data['versao'])) {
    setFileVersion($iniFilePath, $newVersion);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Faltou o parametro"]);
    exit;
}


if (isset($data['exe'])) {
    // Passo 2: Decodificar o arquivo base64
    $fileContent = base64_decode($data['exe']);

    if ($fileContent === false) {
        // Erro na decodificação do base64
        http_response_code(400);
        echo json_encode(["error" => "Base64 decoding failed"]);
        exit;
    }
    
    $filePath = 'C:\Arquivos-FarbenLabel\Exe\FarbenLabel.zip';

    // Certifique-se de que a pasta 'Exe' existe e é gravável
    if (!file_exists('C:\Arquivos-FarbenLabel\Exe')) {
        mkdir('C:\Arquivos-FarbenLabel\Exe', 0777, true);
    }

    if (file_put_contents($filePath, $fileContent) !== false) {
        http_response_code(200);
        echo json_encode(["aviso" => "Arquivo salvo com sucesso!"]);
    } else {
        // Erro ao salvar o arquivo
        http_response_code(500);
        echo json_encode(["error" => "Falha ao salvar o arquivo"]);
    }
} else {
    // JSON inválido ou chave 'exe' não encontrada
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON or missing 'exe' key"]);
}


?>
 