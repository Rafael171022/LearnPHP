<?php 

    function Ini($iniFilePath,$newVersion,$chave,$campo) {
        if (!file_exists($iniFilePath)){
            touch($iniFilePath);
        }
        setFileVersion($iniFilePath, $newVersion,$chave,$campo);
    }

    function getFileVersion($iniFilePath,$chave,$campo) {
        if (file_exists($iniFilePath)) {
            $iniArray = parse_ini_file($iniFilePath, true);
            if (isset($iniArray[$chave][$campo])) {
                return $iniArray[$chave][$campo];
            } else {
                error_log("Tag não encontrada no arquivo .ini");
                return 'Desconhecida';
            }
        } else {
            error_log("Arquivo .ini não encontrado: " . $iniFilePath);
            return 'Desconhecida';
        }
    }
    
    function setFileVersion($iniFilePath, $newVersion,$chave,$campo) {
        // Verifica se o arquivo INI existe
        if (file_exists($iniFilePath)) {
            // Se o arquivo existe, lê seu conteúdo e converte para um array associativo
            $iniArray = parse_ini_file($iniFilePath, true);
        } else {
            // Se o arquivo não existe, inicializa um array vazio
            $iniArray = [];
        }
        
        // Atualiza ou cria a chave que vem do parametro da função
        $iniArray[$chave][$campo] = $newVersion;
        
        // Inicializa uma string para armazenar o conteúdo do INI
        $newIniContent = '';
        
        // Percorre cada seção do array INI
        foreach ($iniArray as $section => $values) {
            // Adiciona o nome da seção ao conteúdo do INI
            $newIniContent .= "[$section]\n";
            
            // Percorre cada chave-valor dentro da seção
            foreach ($values as $key => $value) {
                // Adiciona a chave e o valor ao conteúdo do INI
                $newIniContent .= "$key=$value\n";
            }
            
            // Adiciona uma linha em branco para separar as seções
            $newIniContent .= "\n";
        }
        
        // Escreve o conteúdo atualizado de volta para o arquivo INI
        if (file_put_contents($iniFilePath, $newIniContent) === false) {
            // Se houver uma falha ao escrever no arquivo, registra um erro no log
            error_log("Falha ao escrever no arquivo .ini: " . $iniFilePath);
            return false;
        } else {
            // Se a escrita for bem-sucedida, retorna true
            return true;
        }
    }
    