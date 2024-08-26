<?php 

    // if ($acao == '' && $param = '') {
    //     echo json_encode(['Erro' => 'Caminho não encontrado']);
    // }
    // var_dump($acao);

    // if ($acao == 'lista' && $param == '') {
    //     $db = DB::connect();
    //     $rs = $db->prepare("SELECT TOP 2 * FROM ARQ_USU ORDER BY 2");
    //     $rs->execute();
    //     $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    //     if ($obj) {
    //         echo json_encode(["dados" => $obj]);
    //     }else {
    //         echo json_encode(["dados" => 'Sem dados para exibir']);   
    //     }
    // }

    // if ($acao == 'lista' && $param != '') {
    //     $db = DB::connect();
    //     $rs = $db->prepare("SELECT * FROM PRODUTO WHERE cod_prod = {$param}");
    //     $rs->execute();
    //     $obj = $rs->fetchObject();

    //     if ($obj) {
    //         echo json_encode(["dados" => $obj]);
    //     }else {
    //         echo json_encode(["dados" => 'Sem dados para exibir']);   
    //     }
    // }
