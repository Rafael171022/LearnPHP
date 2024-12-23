<?php
header('Content-Type: application/json');
require_once 'api/Banco/Conexao.php';

// Configurações de conexão
$host       = '';
$dbName     = '';
$username   = '';
$password   = '';

// Criando uma instância da classe de conexão
$dbConnection = new DatabaseConnection($host, $dbName, $username, $password);

try {
    // Conectando ao banco de dados
    $pdo = $dbConnection->connect();

     $sql = "SELECT * FROM (
        SELECT B1_COD, B1_DESC, D2_DOC, D2_EMISSAO, D2_PRCVEN, D2_TOTAL, D2_VALICM, D2_VALIPI, D2_ICMSRET, D2_PICM, D2_IPI,  ROW_NUMBER() OVER(PARTITION BY B1_COD ORDER BY B1_COD, D2_EMISSAO DESC) ORDEM
        FROM SB1010 B1
        JOIN SD2010 D2 ON D2_FILIAL IN ('01','05','07','09','11','15') AND D2_CLIENTE='024807' AND D2_COD=B1_COD AND D2.D_E_L_E_T_=''
        WHERE B1_GRPCOM IN ('FB','MX','BX','AX') AND B1.D_E_L_E_T_='' AND B1_MSBLQL<>'1' AND B1_TIPO='PA' --AND B1_GRUPO<>'EMB'
    ) AS TMP
    WHERE ORDEM = 1
    ORDER BY B1_COD, D2_EMISSAO DESC" ;


    // Exemplo de consulta
    $query = $pdo->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => 'success',
        'data' => $result
    ]);

    // Desconectar
    $dbConnection->disconnect();
} catch (Exception $e) {
    // Retornar erro como JSON
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}


?>
