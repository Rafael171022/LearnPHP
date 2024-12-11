<?php
header('Content-Type: application/json');
include_once "api/reclama/class/classReq.php";
include_once "api/reclama/class/classGetExe.php";

$requestHandler = new ManipuladorDeRequisicoes();
$data = $requestHandler->obterDados();

$dataValidator = new ValidadorDeDados($data);
$dataValidator->validarCampos(['versao', 'app', 'ini']);

$fileHandler = new ManipuladorDeArquivos($data['app'], $data['ini']);
$fileHandler->validarVersao($data['versao']);


