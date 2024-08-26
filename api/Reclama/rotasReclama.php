<?php 

header('Content-Type: application/json');

if ($method == "GET") {
    //Rotas por GET
    switch ($path[1]) {
        case 'ajudaReclama':
            include_once "getAjuda.php";
            break;

        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;
    }
}


if ($method == "POST") {
    switch ($path[1]) {
        case 'incluirNcc':
            include_once "postNCC.php";
            break;

        case 'testeNcc':
            include_once "testeNCC.php";
            break;
    
        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;

    }   
}
