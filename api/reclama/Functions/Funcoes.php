<?php 

function Ini($caminhoArquivoIni, $novaVersao, $chave, $campo) {
    if (!file_exists($caminhoArquivoIni)) {
        touch($caminhoArquivoIni);
    }
    definirVersaoArquivo($caminhoArquivoIni, $novaVersao, $chave, $campo);
}

function obterVersaoArquivo($caminhoArquivoIni, $chave, $campo) {
    if (file_exists($caminhoArquivoIni)) {
        $arrayIni = parse_ini_file($caminhoArquivoIni, true);
        if (isset($arrayIni[$chave][$campo])) {
            return $arrayIni[$chave][$campo];
        } else {
            error_log("Tag não encontrada no arquivo .ini");
            return 'Desconhecida';
        }
    } else {
        error_log("Arquivo .ini não encontrado: " . $caminhoArquivoIni);
        return 'Desconhecida';
    }
}

function definirVersaoArquivo($caminhoArquivoIni, $novaVersao, $chave, $campo) {
    // Verifica se o arquivo INI existe
    if (file_exists($caminhoArquivoIni)) {
        // Se o arquivo existe, lê seu conteúdo e converte para um array associativo
        $arrayIni = parse_ini_file($caminhoArquivoIni, true);
    } else {
        // Se o arquivo não existe, inicializa um array vazio
        $arrayIni = [];
    }
    
    // Atualiza ou cria a chave que vem do parâmetro da função
    $arrayIni[$chave][$campo] = $novaVersao;
    
    // Inicializa uma string para armazenar o conteúdo do INI
    $novoConteudoIni = '';
    
    // Percorre cada seção do array INI
    foreach ($arrayIni as $secao => $valores) {
        // Adiciona o nome da seção ao conteúdo do INI
        $novoConteudoIni .= "[$secao]\n";
        
        // Percorre cada chave-valor dentro da seção
        foreach ($valores as $chave => $valor) {
            // Adiciona a chave e o valor ao conteúdo do INI
            $novoConteudoIni .= "$chave=$valor\n";
        }
        
        // Adiciona uma linha em branco para separar as seções
        $novoConteudoIni .= "\n";
    }
    
    // Escreve o conteúdo atualizado de volta para o arquivo INI
    if (file_put_contents($caminhoArquivoIni, $novoConteudoIni) === false) {
        // Se houver uma falha ao escrever no arquivo, registra um erro no log
        error_log("Falha ao escrever no arquivo .ini: " . $caminhoArquivoIni);
        return false;
    } else {
        // Se a escrita for bem-sucedida, retorna true
        return true;
    }
}
?>
