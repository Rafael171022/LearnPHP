<?php 
class ManipuladorDeVersaoDeArquivo {
    private $versaoDoArquivo;

    public function __construct() {
    }

    public function validarVersao() {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->versaoDoArquivo = obterVersaoArquivo("uploads/FarbenLabel/Labels/NovasLabels.ini", "Novas", "date");
        
        if ($this->versaoDoArquivo === null) {
            echo json_encode(['erro' => 'Arquivo não encontrado']);
        } else {
            $this->enviarDetalhesDoArquivo();
        }
    }

    public function enviarDetalhesDoArquivo() {
        $resposta = [
            'data' => $this->versaoDoArquivo
        ];
        echo json_encode($resposta);
    }
}
?>
