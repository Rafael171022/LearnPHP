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

    // Configurações do web service
    $wsdl = 'http://192.168.0.2:8081/WS_NCC.apw?WSDL';
    
    // Credenciais de autenticação
    $username = 'rest.cliente';
    $password = 'far159';

    $client = new SoapClient($wsdl,array(
        "cache_wsdl" => WSDL_CACHE_NONE,
        'exceptions' => TRUE,
        'encoding' => 'UTF-8',
        'login' => $username,
        'password' => $password,
        // 'stream_context' => $streamContext
    ));

    try {
        // Enviando dados para o web service
        $response = [
            'TOKEN'     => $TOKEN,
            'EMPRESA'   => $EMPRESA,
            'FILIAL'    => $FILIAL,
            'PREFIXO'   => $PREFIXO,
            'NUM'       => $NUM,
            'PARCELA'   => $PARCELA,
            'TIPO'      => $TIPO,
            'NATUREZ'   => $NATUREZ,
            'CLIENTE'   => $CLIENTE,
            'LOJA'      => $LOJA,
            'EMISSAO'   => $EMISSAO,
            'VENCTO'    => $VENCTO,
            'VENCREA'   => $VENCREA,
            'HIST'      => $HIST,
            'VALOR'     => $VALOR,
            'MOEDA'     => $MOEDA
            
            /*  
            // Teste
            'TOKEN'     => 'JCSfdDTPps',
            'EMPRESA'   => '01',
            'FILIAL'    => '01',
            'PREFIXO'   => 'REC',
            'NUM'       => '9999',
            'PARCELA'   => '001',
            'TIPO'      => 'NCC',
            'NATUREZ'   => '1.01',
            'CLIENTE'   => '003186',
            'LOJA'      => '01',
            'EMISSAO'   => '20240822',
            'VENCTO'    => '20240822',
            'VENCREA'   => '20240822',
            'HIST'      => 'TESTE_RECLAMACAO',
            'VALOR'     => 0.01,
            'MOEDA'     => 1

            */
            
        ];

        //Manda Para ws_NCC incluir
        $retorno = $client->SE1_INCLUIR($response);

        echo json_encode(array('status' => 'Ncc Incluida com sucesso'));
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Dados não recebidos.'));
}
