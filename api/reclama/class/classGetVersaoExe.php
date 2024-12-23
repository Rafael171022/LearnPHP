<?php 
// Classe para devolver o arquivo solicitado
class ManipuladorDeVersaoDeArquivo {
    private $ini;
    private $versaoDoArquivo;

    public function __construct($ini) {
        $this->ini = $ini;
    }

    public function validarVersao() {
        include_once "./api/reclama/functions/Funcoes.php";
        $this->versaoDoArquivo = obterVersaoArquivo("uploads/Reclama/Exe/VersaoExe.ini", $this->ini, 'Version');
        
        if ($this->versaoDoArquivo === null) {
            echo json_encode(['aviso' => 'Erro']);
        } else {
            $this->enviarDetalhesDoArquivo();
        }
    }

    public function enviarDetalhesDoArquivo() {
        $resposta = [
            'versao' => $this->versaoDoArquivo
        ];
        echo json_encode($resposta);
    }
}
?>
