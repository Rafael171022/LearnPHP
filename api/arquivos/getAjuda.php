
<?php  
    header('Content-Type: application/json');
    $response = [
        "Rotas GET" => [
            "ajuda"            => "Verificar as rotas",
            "verifica-conexa"  => "Verificar se api esta online",
            "versao"           => "Devolve a versão do arquivo Exe do Farben Label",
            "novaslabels"      => "Devolve a data da ultima alteração das labels",
            "labels"           => "Devolve o zip com as labels",

        ],

        "Rotas POST" => [
            "atualizaExe"  => "Devolve o zip com Executavel atualizado"]
    ];

    echo json_encode($response);