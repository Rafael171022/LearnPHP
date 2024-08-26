<?php 
    header('Acess-Control-Allow-Origin: *');
    //header('Content-Type: application/json');

    if (isset($_GET['path'])) {
        $path = explode("/",$_GET['path']);
    }else {
        echo "Bem vindo a API do PHP";
        exit;
    }

    if (isset($path[0])) { $api     = $path[0]; } else { echo "Caminho não existe"; exit;}
    if (isset($path[1])) { $acao    = $path[1]; } else { $acao  = '';}
    if (isset($path[2])) { $param   = $path[2]; } else { $param = '';}


    $method = $_SERVER['REQUEST_METHOD'];
    
    
    $rota = $path[1];
    
    switch ($api) {
        case 'produto':
            include_once "api/produto/produto.php";
            break;
        case 'farbenlabel':
            include_once "api/FarbenLabel/arquivo.php";
            break;
        case 'reclama':
            include_once "api/Reclama/rotasReclama.php";
            break;
        default:
            echo "Rota não encontrada";
            exit;
    }
?> 