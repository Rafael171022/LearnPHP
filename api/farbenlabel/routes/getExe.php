<?php
header('Content-Type: application/json');
include_once "api/farbenlabel/class/classReq.php";
include_once "api/farbenlabel/class/classGetExe.php";

$requestHandler = new RequestHandler();
$data = $requestHandler->getData();

$dataValidator = new DataValidator($data);
$dataValidator->validateFields(['versao', 'app', 'ini']);

$fileHandler = new FileHandler($data['app'], $data['ini']);
$fileHandler->validateVersion($data['versao']);


