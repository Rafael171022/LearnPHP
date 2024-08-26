<?php 
// header('Content-Type: application/json');

// // Lê os dados brutos do corpo da requisição
// $input = file_get_contents('php://input');

// // Decodifica o JSON para um array associativo em PHP
// $data = json_decode($input, true);

// // Verifica se a decodificação foi bem-sucedida
// if ($data === null) {
//     echo json_encode(['Erro' => 'Dados JSON inválidos']);
//     exit;
// }

// // Verifica se todos os campos necessários estão presentes
// if (!isset($data['cod_prod'], $data['desc_prod'], $data['preco'])) {
//     echo json_encode(['Erro' => 'Dados incompletos']);
//     exit;
// }

// // Monta a query de inserção usando placeholders para prevenir SQL injection
// $sql = "INSERT INTO PRODUTO (cod_prod, desc_prod, preco) VALUES (:cod_prod, :desc_prod, :preco)";

// try {
//     // Conecta ao banco de dados (DB::connect() deve ser implementado)
//     $db = DB::connect();
//     $rs = $db->prepare($sql);
    
//     // Executa a query com os dados fornecidos
//     $exec = $rs->execute([
//         ':cod_prod' => $data['cod_prod'],
//         ':desc_prod' => $data['desc_prod'],
//         ':preco' => $data['preco']
//     ]);

//     // Verifica se a execução foi bem-sucedida
//     if ($exec) {
//         echo json_encode(["dados" => 'Dados incluídos com sucesso!']);
//     } else {
//         echo json_encode(["dados" => 'Erro ao inserir os dados']);   
//     }
// } catch (Exception $e) {
//     // Captura e retorna erros de execução
//     echo json_encode(['Erro' => $e->getMessage()]);
// }

?>


   