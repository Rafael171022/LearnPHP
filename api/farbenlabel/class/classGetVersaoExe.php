<?php 
//Classe para devolver o arquivo solicitado
class FileVersionHandle {
    private $ini;
    private $fileVersion;

    public function __construct($ini) {
        $this->ini = $ini;
    }

   public function validateVersion() {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->fileVersion = getFileVersion("uploads/FarbenLabel/Exe/VersaoExe.ini", $this->ini, 'Version');
        
        if ($this->fileVersion === null) {
            echo json_encode(['aviso' => 'Error']);
        } else {
            $this->sendFileDetails();
        }
    }

    public function sendFileDetails() {
        $response = [
            'versao' => $this->fileVersion
        ];
        echo json_encode($response);
   
    }
}
