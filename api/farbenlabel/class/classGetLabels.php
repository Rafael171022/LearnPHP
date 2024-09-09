<?php
//Classe para devolver o arquivo solicitado
class FileHandler {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function validate() {
        if (file_exists($this->filePath)) {
            $this->sendFileDetails();
        } else {
            echo json_encode(['aviso' => 'Arquivo não encontrado']);
        }
    }

    private function sendFileDetails() {
        $fileName = basename($this->filePath);
        $fileContent = base64_encode(file_get_contents($this->filePath));
        $response = [
            'nome' => $fileName,
            'labels' => $fileContent
        ];

        echo json_encode($response);
    }
};

