<?php 
// Classe para devolver o arquivo solicitado
class ultimaAtualizacao {
    private $versaoDoArquivo;

    public function __construct() {}

    public function verificarArquivo() {
        include_once "./api/farbenlabel/functions/Funcoes.php";
        $this->versaoDoArquivo = obterVersaoArquivo("uploads/FarbenLabel/UltimaAtual.ini", "Atualizacao", "data");

        if ($this->versaoDoArquivo === null) {
            echo json_encode(['aviso' => 'Arquivo de última atualização não encontrado']);
        } else {
            $this->enviarDetalhesDoArquivo();
        }
    }

    public function enviarDetalhesDoArquivo() {
        $resposta = ['ultima' => $this->versaoDoArquivo];
        echo json_encode($resposta);
    }
}
