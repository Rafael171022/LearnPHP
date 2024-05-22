<?php 

// Defina o caminho do arquivo aqui
$filePath = "C:\Farben Label\Labels\ET60x100.fr3";

// Verifica se o arquivo existe
if (file_exists($filePath)) {
    // Obtém detalhes do arquivo
    $fileSize = filesize($filePath);
    $fileName = basename($filePath);

    // Codifica o conteúdo do arquivo em base64
    $fileContent = base64_encode(file_get_contents($filePath));

    // Prepara a resposta JSON com os detalhes do arquivo
    $response = [
        'fileName' => $fileName,
        'fileSize' => $fileSize,
        'fileContent' => $fileContent
    ];

    echo json_encode($response);
} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}

?>