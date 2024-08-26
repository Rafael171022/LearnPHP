<?php
$data = json_decode(file_get_contents('php://input'), true);

// Verifica se os dados foram recebidos corretamente
if ($data) {
    // Extrai os dados do JSON recebido
    $TOKEN      = $data['TOKEN'];
    $EMPRESA    = $data['EMPRESA'];
    $FILIAL     = $data['FILIAL'];
    $PREFIXO    = $data['PREFIXO'];
    $NUM        = $data['NUM'];
    $PARCELA    = $data['PARCELA'];
    $TIPO       = $data['TIPO'];
    $NATUREZ    = $data['NATUREZ'];
    $CLIENTE    = $data['CLIENTE'];
    $LOJA       = $data['LOJA'];
    $EMISSAO    = $data['EMISSAO'];
    $VENCTO     = $data['VENCTO'];
    $VENCREA    = $data['VENCREA'];
    $HIST       = $data['HIST'];
    $VALOR      = $data['VALOR'];
    $MOEDA      = $data['MOEDA'];

    try {
        // Enviando dados para o web service
        $response = [
            'TOKEN' => $TOKEN,
            'EMPRESA' => $EMPRESA,
            'FILIAL' => $FILIAL,
            'PREFIXO' => $PREFIXO,
            'NUM' => $NUM,
            'PARCELA' => $PARCELA,
            'TIPO' => $TIPO,
            'NATUREZ' => $NATUREZ,
            'CLIENTE' => $CLIENTE,
            'LOJA' => $LOJA,
            'EMISSAO' => $EMISSAO,
            'VENCTO' => $VENCTO,
            'VENCREA' => $VENCREA,
            'HIST' => $HIST,
            'VALOR' => $VALOR,
            'MOEDA' => $MOEDA
        ];

        echo json_encode(array('status' => 'success'));
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Dados não recebidos.'));
}
