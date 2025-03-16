<?php

require_once "./Conexao.php";

class Database {

    private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao= $conexao;
    }
    
    public function fecharConexao()
    {
        $this->conexao->close();
    }

    public function executar($sql)
    {
        $dados = [];

        $result = $this->conexao->query($sql);

        $existeDados = $result->num_rows;

        if (!$existeDados) {
            return $dados;
        }

        while ($registro = $result->fetch_assoc()) {
            $linha = (object) $registro;
            $dados[] = $linha;
        }

        return $dados;
    }
}

$bancoDeDados = new Database($conexao);