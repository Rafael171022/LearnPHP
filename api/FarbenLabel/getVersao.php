<?php 
header('Content-Type: application/json');

include_once "Funcoes.php";

// Lê os dados brutos do corpo da requisição
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    // Lê o corpo da requisição
    $input = file_get_contents('php://input');

    // Decodifica o JSON recebido
    $data = json_decode($input, true);

    if (json_last_error() === JSON_ERROR_NONE) {

    } else {
        // Lidar com erro de decodificação
        echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
    }
} else {
    echo 'Método de requisição não suportado ou Content-Type incorreto';

}

// var_dump($data['ini']);
$ini = $data['ini'];
$filePath = "uploads/FarbenLabel/Exe/";

if (file_exists($filePath)) {
    $fileVersion = getFileVersion($filePath.'VersaoExe.ini',$ini,'Version');
    $response = [
        'versao' => $fileVersion
    ];
    echo json_encode($response);

} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}
?>
