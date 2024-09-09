<?php 
header('Content-Type: application/json');

include_once "api/farbenlabel/class/classReq.php";
include_once "api/farbenlabel/class/classGetVersaoExe.php";

$requestHandler = new RequestHandler();
$data = $requestHandler->getData();

$dataValidator = new DataValidator($data);
$dataValidator->validateFields(['ini']);


$fileHandler = new FileVersionHandle($data['ini']);
$fileHandler->validateVersion();
?>