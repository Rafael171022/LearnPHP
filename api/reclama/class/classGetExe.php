<?php
// Classe para devolver o arquivo solicitado
class ManipuladorDeArquivos {
    private $aplicativo;
    private $ini;
    private $caminhoDoArquivo;
    private $versaoDoArquivo;

    public function __construct($aplicativo, $ini) {
        $this->aplicativo = $aplicativo;
        $this->ini = $ini;
        $this->caminhoDoArquivo = "uploads/Reclama/Exe/" . $this->aplicativo;
    }

    public function validarVersao($versaoAtual) {
        include_once "./api/Reclama/functions/Funcoes.php";
        $this->versaoDoArquivo = obterVersaoArquivo("uploads/Reclama/Exe/VersaoExe.ini", $this->ini, 'Version');
       
        if ($versaoAtual < $this->versaoDoArquivo) {
            $this->enviarDetalhesDoArquivo();
        } else {
            echo json_encode(['aviso' => 'atual']);
        }
    }

    private function enviarDetalhesDoArquivo() {
        
        if (file_exists($this->caminhoDoArquivo)) {
            $tamanhoDoArquivo = filesize($this->caminhoDoArquivo);
            $nomeDoArquivo = basename($this->caminhoDoArquivo);
            $conteudoDoArquivo = base64_encode(file_get_contents($this->caminhoDoArquivo));

            $resposta = [
                'aviso'  => 'atualizar',
                'nome'   => $nomeDoArquivo,
                'versao' => $this->versaoDoArquivo,
                'data'   => $conteudoDoArquivo
            ];
            
            echo json_encode($resposta);
        } else {
            echo json_encode(['erro' => 'Arquivo não encontrado']);
        }
    }
}
?>
