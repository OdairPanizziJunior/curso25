<?php

class GerenciadorDeArquivo {

    private $caminhoArquivo = "";

    public function __construct($caminhoArquivoParam)
    {
        $this->caminhoArquivo = $caminhoArquivoParam;

        $existe = $this->verificarArquivoExiste();

        if (!$existe) {
            $this->criarArquivo();
        }
    }

    private function verificarArquivoExiste() {
        return file_exists($this->caminhoArquivo);
    }

    // GET | POST | PUT | DELETE (CRUD)
    private function criarArquivo() {
        file_put_contents($this->caminhoArquivo, "");
        return;
        try{
            $arquivoCriado = file_put_contents($this->caminhoArquivo, "");
    
            if (!$arquivoCriado) {
                throw new Exception("Não foi possivel criar o arquivo.");
            }

        } catch (Exception $error) {
            echo $error->getMessage();
            exit;
        }
    }

    public function escrever($dados) {
        $dadosParaSalvar = json_encode($dados, JSON_PRETTY_PRINT);
        $dadosInseridos = file_put_contents($this->caminhoArquivo, $dadosParaSalvar);

        if (!$dadosInseridos) {
            throw new Exception("Não foi possivel gravar no arquivo as informacoes.");
        }
    }

    public function ler() {
        $dados = file_get_contents($this->caminhoArquivo);

        if (empty($dados)) {
            throw new Exception("Não foi possivel ler os dados do arquivo.");
        }

        return json_decode($dados, true) ?? [];
    }

}