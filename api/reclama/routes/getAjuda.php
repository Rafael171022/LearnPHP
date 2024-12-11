<?php  
    header('Content-Type: application/json');
    $response = [
        "Rotas GET" => [
            "ajuda"     => "Verificar as rotas",
        ],

        "Rotas POST" => [
            "incluir-NCC"  => "Faz a inclusão da NCC"
            ]
    ];

    echo json_encode($response);