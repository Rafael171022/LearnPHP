<?php 
$iniFilePath = "C:\Farben Labelatualizar\Exe\VersaoExe.ini";
//$iniFilePath = "C:\TestesAPI\config-Base.ini";

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


function setFileVersion($iniFilePath, $newVersion) {
    if (file_exists($iniFilePath)) {
        $iniArray = parse_ini_file($iniFilePath, true);
    } else {
        $iniArray = [];
    }

    // Atualiza ou cria a chave 'Version' na seção 'Versao'
    $iniArray['Versao']['Version'] = $newVersion;

    // Converte o array de volta para a sintaxe INI
    $newIniContent = '';
    foreach ($iniArray as $section => $values) {
        $newIniContent .= "[$section]\n";
        foreach ($values as $key => $value) {
            $newIniContent .= "$key=$value\n";
        }
        $newIniContent .= "\n";
    }

    // Escreve o conteúdo atualizado de volta para o arquivo INI
    if (file_put_contents($iniFilePath, $newIniContent) === false) {
        error_log("Falha ao escrever no arquivo .ini: " . $iniFilePath);
        return false;
    } else {
        return true;
    }
}