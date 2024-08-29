<?php 

header('Content-Type: application/json');

if ($method == "GET") {
    //Rotas por GET
    switch ($rota) {
        case 'ajuda':
            include_once "getAjuda.php";
            break;

        case 'verifica-conexao':
            include_once "getConn.php";
            break;

        case 'versao':
            include_once "getVersao.php";
            break;

        case 'novaslabels':
            include_once "getVerLabel.php";
            break;

        case 'labels':
            include_once "getLabels.php";
            break;

        case 'ultima-atualizacao':
            include_once "getUltimaAtual.php";
            break;
            
        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;
    }
}


if ($method == "POST") {
    switch ($rota) {
        case 'atualizaExe':
            include_once "getExe.php";
            break;
        
        case 'geraExe':
            include_once "geraExe.php";
            break;
            
        case 'geraLabel':
            include_once "geraLabel.php";
            break;

        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;

    }   
}
