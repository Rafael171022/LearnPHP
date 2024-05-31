<?php 
header('Content-Type: application/json');
// Defina o caminho do arquivo .ini aqui
$iniFilePath = "C:\Farben Labelatualizar\Labels\NovasLabels.ini";

// Função para obter a versão do arquivo a partir do .ini
function getFileVersion($iniFilePath) {
    if (file_exists($iniFilePath)) {
        $iniArray = parse_ini_file($iniFilePath, true);
        if (isset($iniArray['Novas']['date'])) {
            return $iniArray['Novas']['date'];
        } else {
            error_log("Não foi possivel encontrar");
            return 'Não existe novas labels para atualizar';
        }
    } else {
        error_log("Arquivo .ini não encontrado: " . $iniFilePath);
        return 'Desconhecida';
    }
}

$filePath = "C:\Farben Labelatualizar\Exe\FarbenLabel.zip";
if (file_exists($filePath)) {
    $fileVersion = getFileVersion($iniFilePath);
    $response = [
        'date' => $fileVersion
    ];
    echo json_encode($response);

} else {
    echo json_encode(['Erro' => 'Arquivo não encontrado']);
}


