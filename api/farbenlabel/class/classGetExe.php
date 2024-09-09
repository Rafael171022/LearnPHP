<?php
//Classe para devolver o arquivo solicitado
class FileHandler {
    private $app;
    private $ini;
    private $filePath;
    private $fileVersion;

    public function __construct($app, $ini) {
        $this->app = $app;
        $this->ini = $ini;
        $this->filePath = "uploads/FarbenLabel/Exe/" . $this->app;
    }

    public function validateVersion($versaoAtual) {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->fileVersion = getFileVersion("uploads/FarbenLabel/Exe/VersaoExe.ini", $this->ini, 'Version');

        if ($versaoAtual < $this->fileVersion) {
            $this->sendFileDetails();
        } else {
            echo json_encode(['aviso' => 'atual']);
        }
    }

    private function sendFileDetails() {
        if (file_exists($this->filePath)) {
            $fileSize = filesize($this->filePath);
            $fileName = basename($this->filePath);
            $fileContent = base64_encode(file_get_contents($this->filePath));

            $response = [
                'aviso' => 'atualizar',
                'nome' => $fileName,
                'versao' => $this->fileVersion,
                'data' => $fileContent
            ];

            echo json_encode($response);
        } else {
            echo json_encode(['Erro' => 'Arquivo não encontrado']);
        }
    }
}

?>
