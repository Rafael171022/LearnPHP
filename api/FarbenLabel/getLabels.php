<?php 

header('Content-Type: application/json');
// Arquivo
$filePath = "uploads/FarbenLabel/Labels/Labels.zip";

// Verifica se o arquivo existe
if (file_exists($filePath)) {
    // Obtém detalhes do arquivo
    $fileSize = filesize($filePath);
    $fileName = basename($filePath);

    // Codifica o conteúdo do arquivo em base64
    $fileContent = base64_encode(file_get_contents($filePath));

    // Prepara a resposta JSON com os detalhes do arquivo
    $response = [
        "nome" => $fileName,
        'labels' => $fileContent
    ];

    echo json_encode($response);
} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}

?>
