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