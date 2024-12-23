<?php 

header('Content-Type: application/json');

if ($method == "GET") {
    switch ($rota) {
        case 'precos':
            include_once "routes/getPrecos.php";
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
