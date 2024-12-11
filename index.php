<?php 
    header('Acess-Control-Allow-Origin: *');
  
    $requestUri = $_SERVER['REQUEST_URI'];
    $path       = parse_url($requestUri, PHP_URL_PATH);
    $routes     = explode('/', trim($path, '/'));
   
    if (isset($routes [1])) { $api     = $routes [1]; } else { echo "Caminho não existe"; exit;}
    if (isset($routes [2])) { $acao    = $routes [2]; } else { $acao  = '';}
    if (isset($routes [3])) { $param   = $routes [3]; } else { $param = '';}


    $method = $_SERVER['REQUEST_METHOD'];
    $rota   = $routes[2];
    
    switch ($api) {
        case 'farbenlabel':
            include_once "api/FarbenLabel/router.php";
            break;
        case 'reclama':
            include_once "api/Reclama/routerSAC.php";
            break;
        default:
            echo "Rota não encontrada";
            exit;
    }
?> 