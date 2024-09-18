<?php 
//Classe para devolver o arquivo solicitado
class AppDateHandle {
    private $fileVersion;

    public function __construct() {}

    public function checkfile() {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->fileVersion = getFileVersion("uploads/FarbenLabel/UltimaAtual.ini", "Atualizacao", "data");

        if ($this->fileVersion === null) {
            echo json_encode(['aviso' => 'Arquivo ultima atualização não encontrado']);
        } else {
            $this->sendFileDetails();
        }
    }

    public function sendFileDetails() {
        $response = ['ultima' => $this->fileVersion];
        echo json_encode($response);
    }
}
