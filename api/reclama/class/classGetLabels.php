<?php
// Classe para devolver o arquivo solicitado
class ManipuladorDeArquivo {
    private $caminhoDoArquivo;

    public function __construct($caminhoDoArquivo) {
        $this->caminhoDoArquivo = $caminhoDoArquivo;
    }

    public function validar() {
        if (file_exists($this->caminhoDoArquivo)) {
            $this->enviarDetalhesDoArquivo();
        } else {
            echo json_encode(['aviso' => 'Arquivo não encontrado']);
        }
    }

    private function enviarDetalhesDoArquivo() {
        $nomeDoArquivo = basename($this->caminhoDoArquivo);
        $conteudoDoArquivo = base64_encode(file_get_contents($this->caminhoDoArquivo));
        $resposta = [
            'nome' => $nomeDoArquivo,
            'labels' => $conteudoDoArquivo
        ];

        echo json_encode($resposta);
    }
}
?>
