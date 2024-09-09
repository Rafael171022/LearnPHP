<?php 
class FileVersionHandle {
    private $fileVersion;

    public function __construct() {
    }

    public function validateVersion() {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->fileVersion = getFileVersion("uploads/FarbenLabel/Labels/NovasLabels.ini","Novas","date");
        
        if ($this->fileVersion === null) {
            echo json_encode(['Erro' => 'Arquivo não encontrado']);
        } else {
            $this->sendFileDetails();
        }
    }

    public function sendFileDetails() {
        $response = [
            'date' => $this->fileVersion
        ];
        echo json_encode($response);
   
    }
}

