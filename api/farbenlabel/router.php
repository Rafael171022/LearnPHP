<?php 

header('Content-Type: application/json');

if ($method == "GET") {
    switch ($rota) {
        case 'ajuda':
            include_once "routes/getAjuda.php";
            break;

        case 'verifica-conexao':
            include_once "routes/getConn.php";
            break;

        case 'versao':
            include_once "routes/getVersao.php";
            break;

        case 'novaslabels':
            include_once "routes/getVerLabel.php";
            break;

        case 'labels':
            include_once "routes/getLabels.php";
            break;

        case 'atualizaExe':
            include_once "routes/getExe.php";
            break;

        case 'ultima-atualizacao':
            include_once "routes/getUltimaAtual.php";
            break;
            
        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;
    }
}


if ($method == "POST") {
    switch ($rota) {
    
        // case 'geraExe':
        //     include_once "geraExe.php";
        //     break;
            
        // case 'geraLabel':
        //     include_once "geraLabel.php";
        //     break;

        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;

    }   
}
