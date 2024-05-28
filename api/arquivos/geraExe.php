<?php 
header('Content-Type: application/json');

// Lê os dados brutos do corpo da requisição
$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON,TRUE);

if (isset($input['exe'])) {
    $base64 = $input['exe'];
    
    // Decodificar o valor Base64
    $fileData = base64_decode($base64);

    // Definir o caminho do arquivo para salvar
    $filePath = 'C:/Farben Labelatualizar/Exe';
    //$filePath = 'C:\Program Files (x86)\Teste';
    // Salvar o arquivo

    move_uploaded_file($fileData,$filePath.$fileData);

    // if (file_put_contents($filePath, $fileData) !== false) {
    //     echo "Arquivo salvo com sucesso em: " . $filePath;
    // } else {
    //     echo "Erro ao salvar o arquivo.";
    // }
} else {
    echo "Dados 'exe' não encontrados no JSON.";
}

/*
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
if ($data === null) {
    echo json_encode(['Erro' => 'JSON Invalido']);
    exit;
}

// Verifica se todos os campos necessários estão presentes
if (!isset($data['exe'])) {
    echo json_encode(['Erro' => 'Dados incompletos']);
    exit;
}

// Caminho do arquivo
$filePath = "C:\Farben Labelatualizar\Exe";
$fileContent = $data['exe'];

var_dump(json_decode($fileContent));


//var_dump($fileContent);
  
// Define o caminho e o nome do arquivo de destino
$output = $filePath . '\\' .$fileContent;
      
// Certifica-se de que o diretório de destino existe
if (!is_dir($filePath)) {
    mkdir($filePath, 0755, true);
}
    
// Salva o conteúdo decodificado no arquivo de destino
file_put_contents($FilePath,$fileContent['exe']);

// Prepara a resposta JSON com os detalhes do arquivo
$response = [
    'aviso' => 'Arquivos gerados',
];

echo json_encode($response);
*/
?>
