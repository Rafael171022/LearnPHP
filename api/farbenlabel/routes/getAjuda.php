
<?php  
    header('Content-Type: application/json');
    $response = [
        "Rotas GET" => [
            "ajuda"            => "Verificar as rotas",
            "verifica-conexao"  => "Verificar se api esta online",
            "versao"           => "Devolve a versão do arquivo Exe do Farben Label",
            "novaslabels"      => "Devolve a data da ultima alteração das labels",
            "labels"           => "Devolve o zip com as labels",

        ],

        "Rotas POST" => []
    ];

    echo json_encode($response);