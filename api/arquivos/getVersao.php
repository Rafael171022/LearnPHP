<?php 
    // Defina o caminho do arquivo .ini aqui
    $iniFilePath = "C:\Farben Labelatualizar\Exe\VersaoExe.ini";

    // Função para obter a versão do arquivo a partir do .ini
    function getFileVersion($iniFilePath) {
        if (file_exists($iniFilePath)) {
            $iniArray = parse_ini_file($iniFilePath, true);
            if (isset($iniArray['Versao']['Version'])) {
                return $iniArray['Versao']['Version'];
            } else {
                error_log("Tag 'Version' não encontrada no arquivo .ini");
                return 'Desconhecida';
            }
        } else {
            error_log("Arquivo .ini não encontrado: " . $iniFilePath);
            return 'Desconhecida';
        }
    }

    $filePath = "C:\Farben Labelatualizar\Exe\FarbenLabel.zip";
    if (file_exists($filePath)) {
        // Obtém a versão do arquivo
        $fileVersion = getFileVersion($iniFilePath);
        
        // Codifica o conteúdo do arquivo em base64
        $fileContent = base64_encode(file_get_contents($filePath));

        // Prepara a resposta JSON com os detalhes do arquivo
        $response = [
            'versao' => $fileVersion
        ];

        echo json_encode($response);

    } else {
        echo json_encode(['Erro' => 'Arquivo não encontrado']);
    }
?>
