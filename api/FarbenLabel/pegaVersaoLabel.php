<?php 
$iniFilePath = "C:\Arquivos-FarbenLabel\Labels\NovasLabels.ini";

function setFileVersion($iniFilePath, $newVersion) {
    if (file_exists($iniFilePath)) {
        $iniArray = parse_ini_file($iniFilePath, true);
    } else {
        $iniArray = [];
    }

    // Atualiza ou cria a chave 'Version' na seção 'Versao'
    $iniArray['Novas']['date'] = $newVersion;

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

?>