<?php

header('Acess-Control-Allow-Origin: *');
header('Content-type: application/json');

if (isset($_GET['path'])) {
    $path = explode("/",$_GET['path']);
}else {
    echo "Caminho não existe";
    exit;
}

if (isset($path[0])) { $api     = $path[0]; } else { echo "Caminho não existe"; exit;}
if (isset($path[1])) { $acao    = $path[1]; } else { $acao  = '';}
if (isset($path[2])) { $param   = $path[2]; } else { $param = '';}


$method = $_SERVER['REQUEST_METHOD'];

include_once "classes/dbConn.php";
include_once "api/produto/produto.php";
include_once "api/arquivos/arquivo.php";