<?php

class DatabaseConnection {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbName, $username, $password) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        if ($this->pdo === null) {
            try {
                $dsn = "sqlsrv:Server={$this->host};Database={$this->dbName}";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    public function disconnect() {
        $this->pdo = null;
    }
}

?>
