<?php 

class ManipuladorDeRequisicoes {
    private $dados;
    private $parametrosDeConsulta;

    public function __construct() {
        $this->definirDados();
        $this->definirParametrosDeConsulta();
    }

    private function definirDados() {
        $entrada = file_get_contents('php://input');
        $this->dados = json_decode($entrada, true);
        if ($this->dados === null || json_last_error() !== JSON_ERROR_NONE) {
            $this->enviarErro('Erro ao decodificar JSON: ' . json_last_error_msg());
        }

        if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
            $this->enviarErro('Content-Type incorreto ou método não suportado');
        }
    }

    public function obterDados() {
        return $this->dados;
    }

    private function definirParametrosDeConsulta() {
        $this->parametrosDeConsulta = $_GET; // Acessa os parâmetros da URL
    }

    public function obterParametrosDeConsulta() {
        return $this->parametrosDeConsulta;
    }

    private function enviarErro($mensagem) {
        echo json_encode(['erro' => $mensagem]);
        exit;
    }
}


// Classe que valida os campos passados no corpo da requisição
class ValidadorDeDados {
    private $dados;

    public function __construct($dados) {
        $this->dados = $dados;
    }

    public function validarCampos(array $camposObrigatorios) {
        foreach ($camposObrigatorios as $campo) {
            if (!isset($this->dados[$campo]) || empty($this->dados[$campo])) {
                $this->enviarErro("O campo {$campo} está ausente ou vazio.");
            }
        }
    }

    private function enviarErro($mensagem) {
        echo json_encode(['erro' => $mensagem]);
        exit;
    }
}
?>
