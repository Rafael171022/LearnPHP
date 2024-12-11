<?php 

class RequestHandler {
    private $data;
    private $queryParams;

    public function __construct() {
        $this->setData();
        $this->setQueryParams();
    }

    private function setData() {
        $input = file_get_contents('php://input');
        $this->data = json_decode($input, true);
        if ($this->data === null || json_last_error() !== JSON_ERROR_NONE) {
            $this->sendError('Erro ao decodificar JSON: ' . json_last_error_msg());
        }

        if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
            $this->sendError('Content-Type incorreto ou método não suportado');
        }
    }

    public function getData() {
        return $this->data;
    }

    private function setQueryParams() {
        $this->queryParams = $_GET; // Acessa os parâmetros da URL
    }

    public function getQueryParams() {
        return $this->queryParams;
    }

    private function sendError($message) {
        echo json_encode(['Erro' => $message]);
        exit;
    }
}


//Classe que valida os Campos passados no corpo da requisição
class DataValidator {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function validateFields(array $requiredFields) {
        foreach ($requiredFields as $field) {
            if (!isset($this->data[$field]) || empty($this->data[$field])) {
                $this->sendError("O campo {$field} está ausente ou vazio.");
            }
        }
    }

    private function sendError($message) {
        echo json_encode(['Erro' => $message]);
        exit;
    }
}