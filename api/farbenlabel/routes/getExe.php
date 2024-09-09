<?php
header('Content-Type: application/json');
include_once "api/farbenlabel/class/classReq.php";
include_once "api/farbenlabel/class/classGetExe.php";
include_once "api/farbenlabel/class/classAuth.php";

$requestHandler = new RequestHandler();
$data = $requestHandler->getData();

$dataValidator = new DataValidator($data);
$dataValidator->validateFields(['versao', 'app', 'ini']);

$fileHandler = new FileHandler($data['app'], $data['ini']);
$fileHandler->validateVersion($data['versao']);

// // Verifica se o parâmetro 'token' está presente
// if (isset($queryParams['token'])) {
//     $expectedHash = $queryParams['token'];
    
//     $token = 'farbenlabel'.date('d-m-Y'); 
    
//     $validator = new AuthReq();

//     if ($validator->validateMd5($token, $expectedHash)) {
//         $dataValidator = new DataValidator($data);
//         $dataValidator->validateFields(['versao', 'app', 'ini']);

//         $fileHandler = new FileHandler($data['app'], $data['ini']);
//         $fileHandler->validateVersion($data['versao']);
//     } else {
//         echo json_encode(['message' => 'Token inválido']);
//     }
// } else {
//     echo json_encode(['message' => 'Parâmetro "token" não encontrado']);
// }

