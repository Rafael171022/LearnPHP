<?php 
header('Content-Type: application/json');

include_once "api/reclama/class/classReq.php";
include_once "api/reclama/class/classGetVersaoExe.php";

$requestHandler = new ManipuladorDeRequisicoes();
$data = $requestHandler->obterDados();

$dataValidator = new ValidadorDeDados($data);
$dataValidator->validarCampos(['ini']);


$fileHandler = new ManipuladorDeVersaoDeArquivo($data['ini']);
$fileHandler->validarVersao();
?>