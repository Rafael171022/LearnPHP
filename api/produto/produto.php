<?php 

// class DB {
//     public static function connect() {
//         $host = 'BANCODEDADOS.farben.com.br';  // Nome ou IP do servidor SQL Server
//         $port = '1433';       // Porta padrão do SQL Server (opcional)
//         $database = 'Reclama_teste'; // Nome do banco de dados
//         $user = 'delphixe';         // Usuário do SQL Server
//         $pass = '25Fb!5bna@';      // Senha do usuário

//         try {
//             // String de conexão para o SQL Server usando PDO
//             $dsn = "sqlsrv:Server={$host},{$port};Database={$database}";

//             // Criação da instância PDO
//             $pdo = new PDO($dsn, $user, $pass);

//             // Definindo o modo de erro do PDO para Exceção
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             var_dump($pdo);
//             return $pdo;
//         } catch (PDOException $e) {
//             echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
//             exit;
//         }
//     }
// }
