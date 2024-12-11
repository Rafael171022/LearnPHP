<?php 

header('Content-Type: application/json');


if ($method == "GET") {
    //Rotas por GET
    switch ($rota) {
        case 'ajuda':
            include_once "routes/getAjuda.php";
            break;

        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;
    }
}


if ($method == "POST") {
    switch ($rota) {
        
        case 'incluirNcc':
            include_once "routes/postNCC.php";
            break;

        case 'testeNcc':
            include_once "routes/testeNCC.php";
            break;
    
        default:
            echo json_encode(['erro' => 'Rota desconhecida']);
            break;

    }   
}
