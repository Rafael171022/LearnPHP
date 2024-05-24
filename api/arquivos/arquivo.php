<?php 

if ($method == "GET") {
    //Rotas por GET
    switch ($api) {
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

        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;
    }
}


if ($method == "POST") {
    switch ($api) {
        case 'atualizaExe':
            include_once "getExe.php";
            break;
            
        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;

    }   
}
