<?php 
header('Content-Type: application/json');

// Lê os dados brutos do corpo da requisição
$input = file_get_contents('php://input');


// Decodifica o JSON para um array associativo em PHP
$data = json_decode($input, true);

if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    // Lê o corpo da requisição
    $input = file_get_contents('php://input');

    // Decodifica o JSON recebido
    $data = json_decode($input, true);

    // Verifica se a decodificação foi bem-sucedida
    if (json_last_error() === JSON_ERROR_NONE) {
        // Use os dados decodificados ($data)
        //var_dump($data);  // Para depuração, remova ou substitua por lógica apropriada
    } else {
        // Lidar com erro de decodificação
        echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
    }
} else {
    echo 'Método de requisição não suportado ou Content-Type incorreto';

}


// Verifica se a decodificação foi bem-sucedida
if ($data == null) {
    echo json_encode(['Erro' => 'JSON Invalido']);
    exit;
}

// Verifica se todos os campos necessários estão presentes
if (!isset($data['versao'])) {
    echo json_encode(['Erro' => 'Dados incompletos']);
    exit;
}


// Arquivo
$filePath = "uploads/FarbenLabel/Exe/FarbenLabel.zip";
include_once "Funcoes.php";

$fileVersion = getFileVersion("uploads/FarbenLabel/Exe/VersaoExe.ini",'Versao','Version');

if ($data['versao'] < $fileVersion) {

    // Verifica se o arquivo existe
    if (file_exists($filePath)) {
        // Obtém detalhes do arquivo
        $fileSize = filesize($filePath);
        $fileName = basename($filePath);
        $fileContent = base64_encode(file_get_contents($filePath));

        // Prepara a resposta JSON com os detalhes do arquivo
        $response = [
            'aviso' => 'atualizar',
            'nome' => $fileName,
            'versao' => $fileVersion,
            'data' => $fileContent
        ];

        echo json_encode($response);
    } else {
        echo json_encode(['Erro' => 'Arquivo não encontrado']);
}

}else {
    echo json_encode(['aviso' => 'atual']);
    exit;
}

?>
